<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment; // Assuming your model is named Payment
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MembershipController extends Controller
{
    public function index()
    {
        try {
            $payments = Payment::orderBy('id', 'DESC')->get();

            if ($payments->isNotEmpty()) {
                return response([
                    'success' => true,
                    'message' => 'Payment IDs List',
                    'status' => 200,
                    'data' => $payments,
                ]);
            } else {
                return response([
                    'success' => false,
                    'message' => 'No Payment IDs Found',
                    'status' => 404,
                    'data' => [],
                ]);
            }
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'r_payment_id' => 'required|string|unique:payments,r_payment_id',
                'userId' => 'required|integer',
                'method' => 'required|string',
                'currency' => 'required|string',
                'user_email' => 'required|string|email',
                'package' => 'required|string',
                'amount' => 'required|numeric',
                // 'json_response' => 'required|array',
            ]);

            // Create a new payment instance
            $payment = new Payment();
            $payment->r_payment_id = $validatedData['r_payment_id'];
            $payment->userId = $validatedData['userId'];
            $payment->method = $validatedData['method'];
            $payment->currency = $validatedData['currency'];
            $payment->user_email = $validatedData['user_email'];
            $payment->package = $validatedData['package'];
            $payment->amount = $validatedData['amount'];
            // $payment->json_response = json_encode($validatedData['json_response']);

            $payment->save();

            return response([
                'success' => true,
                'message' => 'Payment data stored successfully',
                'status' => 200,
                'data' => $payment,
            ]);
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
