<?php

namespace App\Http\Requests\Api\V1\User\Auth;

use Illuminate\Foundation\Http\FormRequest;
use function Laravel\Prompts\password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => ['required', 'string'],
            'username'          => ['required', 'string', 'unique:users'],
            'email'             => ['required', 'email', 'unique:users'],
            'password'          => ['required', 'string', 'min:8'],
            'confirm_password'  => ['required', 'same:password'],
        ];
    }
}