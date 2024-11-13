<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Auth\LoginRequest;
use App\Http\Requests\Api\V1\User\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function toAccount()
    {
        $user = User::query()
            ->where('id', auth()->id())
            ->with( 'avatar')
            ->first();

        $data = [
            "title"   => "Account",
            "user" => $user
        ];

        return view('auth.account', compact('data'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to(route('story.index'));
    }
}
