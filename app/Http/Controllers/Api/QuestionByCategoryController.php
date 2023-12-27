<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\QuestionCategory;

class QuestionByCategoryController extends Controller
{
    
    public function __invoke(QuestionCategory $questionCategory)
    {
       $questions=$questionCategory->questions;
       return QuestionResource::collection($questions);
    }
}
