<?php

namespace App\Http\Controllers\Api;

use App\Models\QuestionCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCategoryResource;
use App\Http\Requests\QuestionCategoryStoreRequest;
use App\Http\Requests\QuestionCategoryUpdateRequest;
use App\Repositories\Interfaces\QuestionCategoryRepositoryInterface;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuestionCategoryController extends Controller
{
    private $questionCategoryRepository;

    public function __construct(QuestionCategoryRepositoryInterface $questionCategoryRepository)
    {
        $this->questionCategoryRepository = $questionCategoryRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $categories = $this->questionCategoryRepository->getAll();
        return QuestionCategoryResource::collection($categories);
    }

    /**
     * @param QuestionCategoryStoreRequest $request
     * @return QuestionCategoryResource
     */
    public function store(QuestionCategoryStoreRequest $request): QuestionCategoryResource
    {
        $data = $request->validated();
        $category = $this->questionCategoryRepository->store($data);
        return new QuestionCategoryResource($category);
    }

    /**
     * @param QuestionCategory $category
     * @return QuestionCategoryResource
     */
    public function show(QuestionCategory $questionCategory): QuestionCategoryResource
    {
        return new QuestionCategoryResource($questionCategory);
    }

    /**
     * @param QuestionCategory $questionCategory
     * @param QuestionCategoryUpdateRequest $request
     * @return QuestionCategoryResource
     */
    public function update(QuestionCategory $questionCategory, QuestionCategoryUpdateRequest $request): QuestionCategoryResource
    {
        $data = $request->validated();
        $this->questionCategoryRepository->update($data,$questionCategory);
        return new QuestionCategoryResource($questionCategory);
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
