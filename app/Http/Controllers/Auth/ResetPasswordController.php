<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function resetView(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('prison.auth.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    public function resetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $compare = Hash::check($request->password, $user->password);
        if ($compare) {
            return redirect()->back()
                ->with('error', 'You entered old password');
        } else {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::login($user);
            return redirect()->route('prison.dashboard')
                ->with('success', 'Password Successfully Reset');
        }
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
}
