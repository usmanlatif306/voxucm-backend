<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Voxucm\VoxTenant;
use App\Models\Voxucm\VoxUser;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    use RegistersUsers;

    public function register()
    {

        return view('prison.auth.register');
    }

    public function registerUser(Request $request)
    {
        $this->validator($request->all())->validate();

        // tenant create
        $voxuser = VoxUser::create([
            'Username' => $request->name,
            'password' => sha1($request->password),
            'RoleId' => 25
        ]);

        if ($voxuser) {
            $voxtenant = VoxTenant::create([
                'login_id' => $voxuser->id,
                'firstname' => $request->name,
                'username' => $request->name,
                'emailaddress' => $request->email,
                'payment_terms' => 10
            ]);
        }

        $user = $this->create($request->all());
        $user->update([
            'tenant_user' => $voxuser->id,
            'tenant_id' => $voxtenant->id
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = Str::random(64);
            $user->verification_token = $token;
            $user->save();
            $user->notify(new VerifyEmailNotification($token));
        }
        return view('prison.auth.verify', compact('user'));
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
            'phone' => ['required', 'numeric',],
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
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
