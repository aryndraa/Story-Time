<?php

namespace App\Http\Requests\Api\V1\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            "name"             => ['required', 'string'],
            "about"            => ['nullable', 'string', 'max:500'],
            "avatar"           => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            "old_password"     => ['nullable', 'string'],
            "new_password"     => ['nullable', 'string'],
            "confirm_password" => ['nullable', 'string'],
        ];
    }
}
