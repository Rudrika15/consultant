<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Exception;
use Razorpay\Api\Api;
use App\Models\Payment;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        return view('visitors.razorpayView');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                // Update plantype and validupto for the authenticated user
                $user = Auth::user();
                $user->planType = $request->package;
                $user->validupto = Carbon::now()->addDays(365); // Assuming 1 year validity

                $user->save();

                $package = $request->planType;
                $payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => Auth::user()->email,
                    'userId' => Auth::user()->id,
                    'package' => $package,
                    'amount' => $response['amount'] / 100,
                    'json_response' => json_encode((array)$response)
                ]);
            } catch (Exception $e) {
                return $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }
        Session::put('success', ('Payment Successfully!'));
        return redirect()->back();
    }
}
