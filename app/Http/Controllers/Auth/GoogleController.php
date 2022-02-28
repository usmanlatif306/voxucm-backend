<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voxucm\VoxTenant;
use App\Models\Voxucm\VoxUser;
use App\Notifications\SendingPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->route('prison.dashboard');
        } else {
            $password = Str::random(10);
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => Hash::make($password),
                'is_email_verified' => 1,
            ]);

            // tenant create
            $voxuser = VoxUser::create([
                'Username' => $newUser->name,
                'password' => sha1($password),
                'RoleId' => 25
            ]);

            if ($voxuser) {
                $voxtenant = VoxTenant::create([
                    'login_id' => $voxuser->id,
                    'firstname' => $newUser->name,
                    'username' => $newUser->name,
                    'emailaddress' => $newUser->email,
                    'payment_terms' => 10
                ]);
            }

            $newUser->update([
                'tenant_user' => $voxuser->id,
                'tenant_id' => $voxtenant->id
            ]);
            // if tenant user created then sending password through email
            if ($voxuser) {
                $newUser->notify(new SendingPasswordNotification($newUser->name, $newUser->email, $password));
            }

            // if ($newUser) {
            //     $token = Str::random(64);
            //     $newUser->verification_token = $token;
            //     $newUser->save();
            //     $newUser->notify(new VerifyEmailNotification($token));
            // }

            Auth::login($newUser);

            return redirect()->route('prison.dashboard');
        }
    }
}
