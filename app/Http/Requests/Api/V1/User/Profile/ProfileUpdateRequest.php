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
            "name"             => [ 'string'],
            "about"            => [ 'string', 'max:500'],
            "avatar"           => [ 'file', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            "old_password"     => [ 'string', 'current_password'],
            "new_password"     => [ 'string', 'min:8'],
            "confirm_password" => [ 'same:new_password'],
        ];
    }
}
