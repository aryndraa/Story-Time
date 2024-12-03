<?php

namespace App\Http\Requests\Api\V1\User\StoryManagement;

use Illuminate\Foundation\Http\FormRequest;

class UpSerStoryRequest extends FormRequest
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
            'title'               => ['required', 'string'],
            'categories'          => ['required', 'array'],
            'categories.*'        => ['exists:categories,id'],
            'covers'              => ['required', 'array'],
            'covers.*'            => ['file','mimes:jpg,jpeg,png', 'max:2048'],
            'synopsis'            => ['required', 'string', 'min:50'],
        ];
    }
}
