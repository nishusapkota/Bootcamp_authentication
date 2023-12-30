<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuestionController extends Controller
{
    private $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository=$questionRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index():AnonymousResourceCollection
    {
        $questions=$this->questionRepository->all();
        return QuestionResource::collection($questions);
    }

    /**
     * @param QuestionStoreRequest $request
     * @return QuestionResource 
     */
    public function store(QuestionStoreRequest $request):QuestionResource
    {
       $data=$request->validated();
       $question=$this->questionRepository->store($data);      
       return new QuestionResource($question);
    }

   /**
    * @param Question $question
    * @return QuestionResource
    */
    public function show(Question $question)
    {
       return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateRequest $request,Question $question)
    {
        $data=$request->validated();
        $this->questionRepository->update($data,$question);
        return new QuestionResource($question);

    }

    /*
     * @param Question $question
     * @return void
     */
    public function destroy(Question $question)
    {
        $question->delete(); 
        return response()->noContent();
    }
}
