<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\AdminPackage;
use App\Models\Payment;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
use Razorpay\Api\Api;
use Session;
use Auth;
class UpgradePlanController extends Controller
{
    public function index(Request $request){

        $admin=AdminPackage::where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('consultant.upgradeplan.index',compact('admin'));
        // try{
        //     if ($request->ajax()) {
        //         $data = AdminPackage::where('status', '!=', 'Deleted')
        //             ->orderBy('id', 'DESC')
        //             ->get();
    
        //         return DataTables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function ($row) {
        //                 $btn = '<a href="' . URL::route('consultant.upgradeplan.paymentpage', $row->id) . '" class="btn btn-primary btn-sm me-1 " id="payment">Apply Now</a>';
        //                 return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        //     }
        //     return view('consultant.upgradeplan.index');
        // }catch (\Throwable $th) {
        //     //throw $th;    
        //     return view('servererror');
        // } 
    }
    public function view($id){
        try {
            $package = AdminPackage::findOrFail($id);
            return response()->json($package);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function paymentpage($id){
        $admin=AdminPackage::find($id);
        return view('consultant.upgradeplan.paymentpage',compact('admin'));
    }
    public function store(Request $request) {
        $input = $request->all();
        $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => Auth::user()->email,
                    'userId'=>Auth::user()->id,
                    'amount' => $response['amount']/100,
                    'json_response' => json_encode((array)$response)
                ]);
            } catch(Exceptio $e) {
                return $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        Session::put('success',('Payment Successful'));
        return redirect()->back();
    }

}
