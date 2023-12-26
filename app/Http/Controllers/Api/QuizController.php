<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use Illuminate\Support\Facades\File;
use App\Http\Requests\QuizStoreRequest;
use App\Http\Requests\QuizUpdateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuizController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $quizzes = Quiz::paginate(5);
        return QuizResource::collection($quizzes);
    }


    /**
     * @param QuizStoreRequest $request
     * @return QuizResource
     */
    public function store(QuizStoreRequest $request): QuizResource
    {
        $data = $request->validated();

        $image = $request->file('thumbnail');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/quiz', $image_name);
        $data['thumbnail'] = $path;

        $quiz = Quiz::create($data);

        return new QuizResource($quiz);
    }


    /**
     * Undocumented function
     *
     * @param Quiz $quiz
     * @return QuizResource
     */
    public function show(Quiz $quiz): QuizResource
    {
        return new QuizResource($quiz);
    }


    /**
     * @param QuizUpdateRequest $request
     * @param Quiz $quiz
     * @return QuizResource
     */
    public function update(QuizUpdateRequest $request, Quiz $quiz): QuizResource
    {
        $data = $request->validated();

        if ($request->file('thumbnail')) {
            if (File::exists(storage_path('app/' . $quiz->thumbnail))) {
                unlink(storage_path('app/' . $quiz->thumbnail));
            }
            $image = $request->file('thumbnail');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/quiz/', $image_name);
            $data['thumbnail'] = $path;
        }

        $quiz->update($data);

        return new QuizResource($quiz);
    }


    /**
     * @param Quiz $quiz
     * @return void
     */
    public function destroy(Quiz $quiz)
    {
        $path = storage_path('app/' . $quiz->thumbnail);
        unlink($path);

        $quiz->delete();

        return response()->noContent();
    }
}
