<?php

namespace App\Http\Requests\Api\V1\User\StoryManagement;

use Illuminate\Foundation\Http\FormRequest;

class UpSerStoryManagementRequest extends FormRequest
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
            'title'             => ['required', 'string'],
            'story_category_id' => ['required', 'exists:story_categories,id'],
            'content'           => ['required', 'string', 'min:50'],
            'covers'            => ['required', 'array'],
            'covers.*'          => ['file','mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
}
