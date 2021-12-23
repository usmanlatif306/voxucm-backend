<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

// google auth
Route::get('authorized/google', [GoogleController::class, 'redirectToGoogle'])->name('prison.google');
Route::get('authorized/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// FaceBook Auth
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('prison.facebook');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

// Prison Auth
Route::get('/register', [RegisterController::class, 'register'])->name('prison.register')->middleware('guest');
Route::post('/register', [RegisterController::class, "registerUser"])->name('prison.registeruser');

Route::get('/login', [LoginController::class, 'loginForm'])->name('prison.login')->middleware('guest');
Route::post('/login', [LoginController::class, "loginUser"])->name('prison.loginuser');


Route::get('/account/verification', [VerificationController::class, 'verification'])->name('prison.verify');

// verify User
Route::get('account/verify/{token}', [VerificationController::class, 'verifyAccount'])->name('user.verify');

Route::post('send-email-token-again', [VerificationController::class, 'resendToken'])->name('user.reverify');
// forget password
Route::get('/forget-password', [ForgotPasswordController::class, 'forgetPasswordView'])->name('prison.forgetView');
Route::post('/forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('prison.forget');
// reset password
Route::get('/reset-password', [ResetPasswordController::class, 'resetView'])->name('prison.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('prison.update');
// logout
Route::get('/logout', [LoginController::class, 'logout'])->name('prison.logout')->middleware('auth');

// mobile verification
Route::group(['middleware' => 'auth'], function () {

    Route::post('/user/phone', [VerificationController::class, 'sendOTP'])->name('prison.mobile');
    Route::get("/user/verify/phone", function () {
        return view('prison.auth.mobile');
    })->name('prison.mobile.show');
    Route::post('/user/verify/phone', [VerificationController::class, 'verifyOTP'])->name('mobile.verify');
    Route::post('/user/verify/phone/resend', [VerificationController::class, 'resendOTP'])->name('prison.mobile.resend');
});
