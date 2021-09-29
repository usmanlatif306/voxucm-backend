<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Getting all users
    public function index()
    {
        $users = User::get();
        return $users;
    }

    // Create New User
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:5',
            'email' => 'required|email',
            'password' => 'required|min:8|max:15',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        if ($user) {
            return response()->json([
                "status" => "200",
                "message" => "User Created Successfully",
                "token" => $token,
                "user" => $user
            ], 200);
        } else {
            return response()->json([
                "status" => "401",
                "message" => "Something Went Wrong"
            ], 401);
        }
    }

    // Login User
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:15',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                "status" => "401",
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            "status" => "200",
            "message" => "user login successfully",
            "user" => $user,
            "token" => $token,
        ], 200);
    }

    // Logout A user
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return response()->json([
            "status" => "200",
            "message" => "You are logged out"
        ]);
    }
}
