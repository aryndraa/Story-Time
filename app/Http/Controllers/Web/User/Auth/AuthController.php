<?php

namespace App\Http\Controllers\Web\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Auth\LoginRequest;
use App\Http\Requests\Api\V1\User\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function toLogin()
    {
        $data = [
            "title"   => "Login"
        ];

        return view('auth.login', compact('data'));
    }

    public function login(LoginRequest $request)
    {
        $validator = $request->only('credential', 'password');

        $user = User::query()->where('email', $validator['credential'])
            ->orWhere('username', $validator['credential'])
            ->first();

        if (!$user || !Hash::check($validator['password'], $user->password)) {
            throw ValidationException::withMessages([
                'credential' => "username/email or password is incorrect",
            ]);
        }

        $token = $user->createToken('User')->plainTextToken;

        return response()->json([
            'data' => [
                'token' => $token,
            ]
        ]);
    }

    public function toRegister()
    {
        $data = [
            "title"   => "Register"
        ];

        return view('auth.register', compact('data'));
    }

    public function confirm()
    {
        $name     = request()->input('name');
        $username = request()->input('username');
        $email    = request()->input('email');

        $data = [
            "title"   => "Register",
            "name"    => $name,
            "username" => $username,
            "email"   => $email,
        ];

        return view('auth.confirm', compact('data'));
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('User')->plainTextToken;

        return redirect()->to(route('story.index'));
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->noContent();
    }
}
