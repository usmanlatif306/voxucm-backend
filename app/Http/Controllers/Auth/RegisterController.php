<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use App\Services\TenantService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
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

        // creating voxucm user
        $voxUser = (new TenantService())->createVoxUser($request->name, $request->email, $request->password);

        $user = $this->create($request->all());
        // creating user details
        $user->user_details()->create($request->all());
        // saving voxusm user details in db
        $user->vox_user()->create([
            'tenant_id' => $voxUser->tenant_id,
            'api_username' => $voxUser->extension,
            'api_password' => $voxUser->apisecret,
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
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric',],
            'postcode' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'prison_fname' => ['required', 'string', 'max:255'],
            'prison_lname' => ['required', 'string', 'max:255'],
            'prison_number' => ['required', 'numeric'],
            'prison_status' => ['required',],
            'release_date' => [$data['prison_status'] === 'sentenced' ? 'required' : 'nullable', 'date'],
            'prison_relation' => ['required', 'string', 'max:255'],
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
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'postcode' => $data['postcode'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
