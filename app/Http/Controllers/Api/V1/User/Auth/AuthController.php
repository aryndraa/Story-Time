<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Auth\LoginRequest;
use App\Http\Requests\Api\V1\User\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validator = $request->only('credentials', 'password');

        $user = User::query()->where('email', $validator['credentials'])
                ->orWhere('username', $validator['credentials'])
                ->first();

        if (!$user || !Auth::attempt(['email' => $user->email, 'password' => $validator['password']])) {
            return response()->json([
                'errors' => 'Invalid credentials or password',
            ], 401);
        }

        $token = $user->createToken('User')->plainTextToken;

        return response()->json([
            'data' => [
                'token' => $token,
            ]
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('User')->plainTextToken;

        return response()->json([
            'data' => [
                'token' => $token,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
