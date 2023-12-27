<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionCategoryResource;

class CategoryByQuestionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Question $question)
    {
        $category=$question->category;
        return new QuestionCategoryResource($category);

    }
}
