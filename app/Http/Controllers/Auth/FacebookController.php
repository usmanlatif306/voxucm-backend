<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\Voxucm\VoxTenant;
use App\Models\Voxucm\VoxUser;
use App\Notifications\SendingPasswordNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Notifications\VerifyEmailNotification;
use App\Services\TenantService;
use Illuminate\Support\Facades\Hash;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $finduser = User::where('facebook_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->route('prison.dashboard');
        } else {
            $password = Str::random(10);
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'facebook_id' => $user->id,
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
