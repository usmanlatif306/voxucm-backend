<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserVerify;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function register()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('prison.auth.register');
    }

    public function registerUser(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());

        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);
        $user = User::first();
        $user->notify(new VerifyEmailNotification($token));

        return redirect()->route('prison.verify');
    }

    // Verify Account
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();


        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        } else {
            $message = "Invalid Token";
            return redirect()->route('prison.login')->with('error', $message);
        }

        return redirect()->route('prison.login')->with('success', $message);
    }

    // Send Again email verification token
    public function sendtokenagain()
    {
        $token = Str::random(64);
        $user = User::first();
        $user->notify(new VerifyEmailNotification($token));

        return redirect()->route('prison.verify')->with('resent', "Email verification code send again");
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
