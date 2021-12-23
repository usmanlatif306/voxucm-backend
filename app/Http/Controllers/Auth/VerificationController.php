<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Mail\VerifyEmail;
use App\Models\Otp;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use App\Notifications\VerifyNumberNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VerificationController extends Controller
{
    use VerifiesEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    // verification view
    public function verification()
    {
        if (auth()->user()->is_email_verified === 1) {
            return redirect()->back();
        }
        return view('prison.auth.verify');
    }

    // Verify Account
    public function verifyAccount($token, Request $request)
    {
        $user = User::where([
            'email' => $request->email,
            'verification_token' => $token
        ])->first();

        if (!is_null($user)) {
            if ($user->is_email_verified === 0) {
                $user->is_email_verified = 1;
                $user->save();
                $message = "Congratulation your email has been verified";
                Auth::login($user);
            } else {
                $message = "Your e-mail is already verified.";
            }
            return redirect()->route('prison.dashboard')->with('success', $message);
        } else {
            Auth::logout();
            session()->flush();
            return redirect()->route('prison.login')->with('error', "Token expired");
        }
    }

    // Send Again email verification token
    public function resendToken()
    {
        $token = Str::random(64);
        $user = User::where('id', Auth::user()->id)->first();
        $user->verification_token = $token;
        $user->save();
        $user->notify(new VerifyEmailNotification($token));

        return redirect()->route('prison.verify')->with('resent', "Email verification code send again");
    }

    // Send OTP for mobile verification
    public function sendOTP()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $generated_otp = $this->randInt(6) . '';
        $Otp = Otp::create([
            'user_id'   => $user->id,
            'otp'   => password_hash($generated_otp, PASSWORD_DEFAULT)
        ]);
        $user->notify(new VerifyNumberNotification($generated_otp));

        return redirect()->route('prison.mobile.show')->with('success', "One Time Password (OTP) has been send to your register number.");
    }

    // verify OTP for mobile number verification
    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'numeric'],
        ]);

        $otp = Otp::where('user_id', Auth::user()->id)->orderby('id', 'desc')->first();

        if (is_null($otp)) {
            abort(404);
        }
        if (password_verify($request->otp, $otp->otp)) {
            Auth::user()->is_phone_verified = 1;
            Auth::user()->save();
            return redirect()->route('user.account')->with('success', "Congratulation your mobile number has been verified");
        }
        return redirect()->back()->with('error', "Invalid One Time Password");
    }

    // Resend OTP
    public function resendOTP()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $generated_otp = $this->randInt(6) . '';
        $Otp = Otp::create([
            'user_id'   => $user->id,
            'otp'   => password_hash($generated_otp, PASSWORD_DEFAULT)
        ]);
        $user->notify(new VerifyNumberNotification($generated_otp));

        return redirect()->route('prison.mobile.show')->with('success', "One Time Password (OTP) has been send to your register number.");
    }

    private function randInt($digits)
    {

        return rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    }
}
