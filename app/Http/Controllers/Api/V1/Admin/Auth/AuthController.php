<?php

namespace App\Http\Controllers\Api\V1\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Auth\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validator = $request->only('credentials', 'password');

        $admin = Admin::query()->where('email', $validator['credentials'])
            ->orWhere('name', $validator['credentials'])
            ->first();

        if (!$admin || !Hash::check($request->string('password'), $admin->password)) {
            throw ValidationException::withMessages([
                'email' => 'email or password is incorrect',
            ]);
        }

        $token = $admin->createToken('admin')->plainTextToken;

        return response()->json([
            'data' => [
                'token' => $token,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->noContent();
    }

}
