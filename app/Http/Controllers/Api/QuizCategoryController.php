<?php

namespace App\Http\Controllers\Api;

use App\Models\QuizCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuizCategoryStoreRequest;
use App\Http\Requests\QuizCategoryUpdateRequest;
use App\Http\Resources\QuizCategoryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuizCategoryController extends Controller
{
   /**
    * @return AnonymousResourceCollection
    */ 
    public function index():AnonymousResourceCollection
    {
        $quizCategories=QuizCategory::paginate(2);
        return QuizCategoryResource::collection($quizCategories);
    }

    /**
     * @param QuizCategoryStoreRequest $request
     * @return QuizCategoryResource
     */
    public function store(QuizCategoryStoreRequest $request):QuizCategoryResource
    {
        $data=$request->validated();

        $quizCategory=QuizCategory::create($data);
        
        return new QuizCategoryResource($quizCategory);
    }

    /**
     * @param QuizCategory $quizCategory
     * @return QuizCategoryResource
     */
    public function show(QuizCategory $quizCategory):QuizCategoryResource
    {
        return new QuizCategoryResource($quizCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuizCategoryUpdateRequest $request, QuizCategory $quizCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
