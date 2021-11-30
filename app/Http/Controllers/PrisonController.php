<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PrisonController extends Controller
{

    public function __construct()
    {
    }
    public function index()
    {
        return view('prison.index');
    }
    // dashboard
    public function dashboard()
    {
        return view('prison.dashboard.home');
    }
    // setting
    public function setting()
    {
        return view('prison.dashboard.setting');
    }

    // updating password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if (Auth::attempt(['email' => auth()->user()->email, 'password' => $request->old_password])) {
            $user = User::where('email', auth()->user()->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password Successfully Updated');
        }
        return redirect()->back()->with('error', 'Invalid Old Password');
        $validId = auth()->user()->email === $request->email;
        if ($validId) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password Successfully Updated');
        }
        return redirect()->back()->with('email', 'Invalid Email ID');
    }

    // updating details
    public function updateDetails(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($request->phone !== $user->phone) {
            $user->is_phone_verified = 0;
            $user->save();
        }
        $user->update($request->all());
        return redirect()->back()->with('status', 'User Details Successfully Updated');
    }

    // buymore
    public function buymore()
    {
        return view('prison.dashboard.buymore');
    }

    // accounts
    public function accounts()
    {
        return view('prison.dashboard.accounts');
    }
    // usage
    public function usage()
    {
        return view('prison.dashboard.usage');
    }
    // usage
    public function expiry()
    {
        return view('prison.dashboard.expiry');
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
