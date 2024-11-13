<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

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

        auth()->login($user);

        return redirect()->to(route('story.index'));
    }

}
