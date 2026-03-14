<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SignupOtpAPI extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);

        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

        $twilio->verify->v2->services(env('TWILIO_VERIFY_SID'))
            ->verifications
            ->create($request->phone, "sms");

        return response()->json([
            'message' => 'OTP sent successfully'
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'otp' => 'required'
        ]);

        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

        $verification = $twilio->verify->v2
            ->services(env('TWILIO_VERIFY_SID'))
            ->verificationChecks
            ->create([
                'to' => $request->phone,
                'code' => $request->otp
            ]);

        if ($verification->status === "approved") {
            return response()->json(['message' => 'Phone verified successfully']);
        }

        return response()->json(['message' => 'Invalid OTP'], 400);
    }
}