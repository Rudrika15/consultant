<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\RegisterWorkshop;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterWorkshopController extends Controller
{
    public function razorpayPaymentStore(Request $request)
    {
        try {
            $rules = array(
                'workshopId' => 'required',
                'r_payment_id' => '',
                'amount' => '',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response([
                    'success' => false,
                    'message' => $validator->errors(),
                    'status' => 404
                ]);
            }

            // Check if the user is already registered for the workshop
            $existingRegistration = RegisterWorkshop::where('workshopId', $request->workshopId)
                ->where('userId', $request->userId)
                ->first();

            if ($existingRegistration) {
                return response([
                    'success' => false,
                    'message' => 'You are already registered for this workshop.',
                    'status' => 400
                ]);
            }

            // Store payment details
            $payment = new Payment();
            $payment->userId = $request->userId;
            $payment->r_payment_id = $request->input('paymentId');
            $payment->amount = $request->input('amount');
            $payment->save();

            // Register for the workshop
            $workshop = new RegisterWorkshop();
            $workshop->workshopId = $request->workshopId;
            $workshop->userId = $request->userId;

            $workshop->save();

            return response([
                'success' => true,
                'message' => 'You are registered for the workshop successfully.',
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
