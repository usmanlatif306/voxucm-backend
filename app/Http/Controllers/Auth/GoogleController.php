<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voxucm\VoxTenant;
use App\Models\Voxucm\VoxUser;
use App\Notifications\SendingPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use App\Services\TenantService;
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

            // creating voxucm user
            $voxUser = (new TenantService())->createVoxUser($newUser->name, $newUser->name, $password);
            // saving voxusm user details in db
            $newUser->vox_user()->create([
                'tenant_id' => $voxUser->tenant_id,
                'api_username' => $voxUser->extension,
                'api_password' => $voxUser->apisecret,
            ]);

            // if tenant user created then sending password through email
            if ($voxUser) {
                $newUser->notify(new SendingPasswordNotification($newUser->name, $newUser->email, $password));
            }

            Auth::login($newUser);

            return redirect()->route('prison.dashboard');
        }
    }
}
