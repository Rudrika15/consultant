<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\OTPProvider;
class OTPController extends Controller
{
    public function sendOTP(Request $request, OTPProvider $otpprovider)
    {
        $mobileNumber = $request->input('mobile_number');
        $otp = $otpprovider->generateOTP();

        // Here, you can integrate with an SMS gateway to send the OTP to the user's mobile number.
        // Replace the following line with your actual SMS sending code.
        // Example: send_otp_sms($mobileNumber, $otp);
        
        return response()->json([
            'message' => 'OTP sent successfully',
            'mobilenumber'=>$mobileNumber,
            'otp'=>$otp
        ]);
    }
}
