<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Notifications\AdminPasswordResetNotification;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AAuthController extends Controller
{
    use ResetsPasswords;
    // show register page
    public function showregister()
    {
        return view('admin.auth.register');
    }

    // register an admin
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->with('success', "Admin has been created");
    }

    // show login page
    public function showlogin()
    {
        return view('admin.auth.login');
    }

    // admin login
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()
                    ->with('error', 'Invalid Password');
            }
        }
        return redirect()->back()->with('error', "No Admin Found");
    }

    // Forget password
    public function forget()
    {
        return view('admin.auth.forget');
    }

    public function forgetpassword(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            $token = Str::random(64);
            $admin->notify(new AdminPasswordResetNotification($token));
            return redirect()->back()->with('success', "Forget Password Link hase been send to given Email");
        }
        return redirect()->back()->with('error', "No Admin Found Against This Email");
    }

    // Reset password
    public function reset(Request $request)
    {

        return view('admin.auth.reset')->with(
            ['token' => $request->token, 'email' => $request->email]
        );
    }

    public function resetpassword(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $admin = Admin::where('email', $request->email)->first();
        $admin->password = Hash::make($request->password);
        $admin->save();
        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.dashboard')
            ->with('success', 'Password Successfully Reset');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        // Session::flush();

        return redirect()->route('admin.login');
    }
}
