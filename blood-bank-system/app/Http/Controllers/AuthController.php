<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{

    public function register(LoginRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'staff'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'user' => $user
        ]);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)
            ->first();

        if (
            !$user ||
            !Hash::check(
                $request->password,
                $user->password
            )
        ) {

            return response()->json([

                'success' => false,

                'message' => 'Invalid credentials'

            ]);
        }

        $token = $user
            ->createToken('Blood Bank API')
            ->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login Successful',
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([

            'success' => true,

            'message' => 'Logged out'

        ]);
    }
}
