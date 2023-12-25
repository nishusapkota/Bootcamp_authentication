<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuestionController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index():AnonymousResourceCollection
    {
        $questions=Question::all();
        return QuestionResource::collection($questions);
    }

    /**
     * @param QuestionStoreRequest $request
     * @return QuestionResource 
     */
    public function store(QuestionStoreRequest $request):QuestionResource
    {
       $data=$request->validated();

       $question=Question::create($data);
       
       return new QuestionResource($question);
    }

   
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

        $question_updated=$question->update($data);

        return new QuestionResource($question_updated);

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
