<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            "title" => 'required|string|max:255',
            "content" => 'string',
            "published" => 'string',
            "draft" => 'string',
            "slug" => 'required|string|max:255|regex:/^[a-z0-9-]+$/',
            "category" => 'required',
            "tags" => 'required',
            "comments" => 'string',
            "likes" => 'string',
        ];
    }
}
