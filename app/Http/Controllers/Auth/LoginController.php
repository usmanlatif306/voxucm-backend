<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\AuthService;
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
        // $orders = Order::whereIn('id', session('user.cart'))->where('order_status', 'Unpaid')->get();
        // dd($orders);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->is_email_verified === 0) {
                return redirect()->back()->with('error', "Please verify your email to login");
            }
            if ($user->status === 0) {
                return redirect()->back()->with('error', "Your account has been suspended by admin. please contact at 'admin@voxucm.com'");
            }
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
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
                // redirect to dashboard
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
