<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // Show login form
    public function loginForm(Request $request)
    {
        return view('prison.auth.login');
    }
    // login user
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->is_email_verified === 0) {
                return redirect()->back()->with('error', "Please verify your email to login");
            }
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                if ($request->session()->has('redirect')) {
                    $request->session()->forget('redirect');
                    return redirect()->route('prison.cart');
                }

                return redirect()->route('prison.dashboard')
                    ->with('success', 'You have Successfully loggedin');
            } else {
                return redirect()->back()
                    ->with('error', 'Invalid Password');
            }
        }
        return redirect()->back()->with('error', "No User Found");
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        // Session::flush();

        return Redirect('login');
    }
}
