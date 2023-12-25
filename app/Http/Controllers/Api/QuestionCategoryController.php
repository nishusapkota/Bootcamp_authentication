<?php

namespace App\Http\Controllers\Api;

use App\Models\QuestionCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\QuestionCategoryStoreRequest;
use App\Http\Requests\QuestionCategoryUpdateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuestionCategoryController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index():AnonymousResourceCollection
    {
        $categories=QuestionCategory::paginate(1);
        return QuestionCategoryResource::collection($categories);
    }

    /**
     * @param QuestionCategoryStoreRequest $request
     * @return QuestionCategoryResource
     */
    public function store(QuestionCategoryStoreRequest $request):QuestionCategoryResource
    {
        $data=$request->validated();

        $category=QuestionCategory::create($data);

        return new QuestionCategoryResource($category);
    }

    /**
     * @param QuestionCategory $category
     * @return QuestionCategoryResource
     */
    public function show(QuestionCategory $questionCategory):QuestionCategoryResource
    {
     return new QuestionCategoryResource($questionCategory);
    }

    /**
     * @param QuestionCategory $questionCategory
     * @param QuestionCategoryUpdateRequest $request
     * @return QuestionCategoryResource
     */
    public function update(QuestionCategory $questionCategory,QuestionCategoryUpdateRequest $request):QuestionCategoryResource
    {
       $data=$request->validated();

       $category_updated=$questionCategory->update($data);

       return new QuestionCategoryResource($category_updated);
    }

    /**
     * @param QuestionCategory $questionCategory
     * @return void
     */
    public function destroy(QuestionCategory $questionCategory)
    {
        $questionCategory->delete();
        
        return response()->noContent();
    }
}
