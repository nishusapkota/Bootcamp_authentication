<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\QuizCategoryController;
use App\Http\Controllers\CategoryByQuestionController;
use App\Http\Controllers\Api\QuestionCategoryController;
use App\Http\Controllers\Api\QuestionByCategoryController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
require __DIR__.'/auth.php';

Route::group(['prefix'=>'admin','middleware'=>'auth:sanctum'],function()
{
    Route::apiResource('question-categories',QuestionCategoryController::class);
    Route::apiResource('questions',QuestionController::class);
    Route::apiResource('quiz-categories',QuizCategoryController::class);
    Route::apiResource('quizzes',QuizController::class);
    Route::get('question-categories/{questionCategory}/questions',QuestionByCategoryController::class);
    Route::get('question/{question}/question-category',CategoryByQuestionController::class);
});
