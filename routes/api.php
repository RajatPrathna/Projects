<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupOtpAPI;

Route::post('/send-otp', [SignupOtpAPI::class, 'sendOtp']);
Route::post('/verify-otp', [SignupOtpAPI::class, 'verifyOtp']);