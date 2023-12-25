<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\QuestionCategoryController;
use App\Http\Controllers\Api\QuizCategoryController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
require __DIR__.'/auth.php';

Route::apiResource('question-categories',QuestionCategoryController::class);
Route::apiResource('questions',QuestionController::class);
Route::apiResource('quiz-categories',QuizCategoryController::class);