<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest
{
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
            'title' => "string|required|max:255",
            'category_id' => "required|exists:question_categories,id",
            'slug' => "string|required|max:255|unique:questions,slug",
            'description' => "string|nullable|max:5000",
            'options' => "array|required",
            'answer' => "string|required|max:255|in_array:options.*",
            "weightage" => "required|integer|min:10",
            "status" => "boolean|nullable"
        ];
    }
}
