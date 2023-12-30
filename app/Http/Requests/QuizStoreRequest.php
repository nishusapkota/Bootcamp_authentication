<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizStoreRequest extends FormRequest
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
            'title'=>'string|required|max:255',
            'slug'=>'string|required|max:255|unique:quizzes,slug',
            'category_id'=>'required|exists:quiz_categories,id',
            'thumbnail'=>'required|image|mimes:png,jpg,jpeg,gif',
            'description'=>'nullable|string|max:4000',
            'time' => 'required|string',
            'retry_after' => 'required|string',
            'status' => 'required|boolean',
            'questionCategory_id' => 'required|exists:question_categories,id',
        ];
    }
}
