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
        try{
            $admin=AdminPackage::where('status', '!=', 'Deleted')
                ->orderBy('id', 'DESC')
                ->get();
            return view('consultant.upgradeplan.index',compact('admin'));
        }catch (\Throwable $th) {
                //throw $th;    
                return view('servererror');
        } 
    }
    public function store(Request $request) {
        $input = $request->all();
        $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $package=$request->package;
                $payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => Auth::user()->email,
                    'userId'=>Auth::user()->id,
                    'package'=> $package,
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
