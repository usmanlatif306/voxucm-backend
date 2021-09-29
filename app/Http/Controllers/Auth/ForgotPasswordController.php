<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\PassResetNotification;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    // Forget Password
    public function forgetPasswordView()
    {
        return view('prison.auth.forget');
    }
    public function forgetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $token = Str::random(64);
            $user->notify(new PassResetNotification($token));
            return redirect()->back()->with('status', "Forget Password Link hase been send to given Email");
        }
        return redirect()->back()->with('error', "No User Found Against This Email");
    }
}
