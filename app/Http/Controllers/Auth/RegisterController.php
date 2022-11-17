<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use App\Services\AuthService;
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
        // $user->user_details()->create($request->all());
        // saving voxusm user details in db
        $user->vox_user()->create([
            'tenant_id' => $voxUser->tenant_id,
            'api_username' => $voxUser->extension,
            'api_password' => $voxUser->apisecret,
        ]);

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     $token = Str::random(64);
        //     $user->verification_token = $token;
        //     $user->save();
        //     $user->notify(new VerifyEmailNotification($token));
        // }
        // return view('prison.auth.verify', compact('user'));
        Auth::login($user);

        // if session cart has orders then updating user_id for that orders
        if (session('user.cart') && count(session('user.cart')) > 0) {
            $orders = Order::whereIn('id', session('user.cart'))->where('order_status', 'Unpaid')->get();
            foreach ($orders  as $order) {
                $order->update(['user_id' => auth()->id()]);
            }
            $request->session()->forget('user.cart');
            return redirect()->route('prison.cart');
        }
        // if user has to redirect to specific page after login
        if ($request->session()->has('redirect')) {
            $redirect = session('redirect');
            $request->session()->forget('redirect');
            return redirect()->route($redirect);
        }

        return redirect()->route('prison.dashboard');
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
            'name' => ['required', 'string', 'max:30', 'unique:mysql2.vox_tenant,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'unique:mysql2.vox_tenant,emailaddress'],
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
            'is_email_verified' => true
        ]);
    }
}
