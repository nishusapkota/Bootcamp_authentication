<?php

namespace App\Repositories;

use App\Models\Question;

use App\Repositories\Interfaces\QuestionRepositoryInterface;

Class QuestionRepository implements QuestionRepositoryInterface
{
    public function all()
    {
        return Question::all();
    }

    public function store($data)
    {
        return Question::create($data);
    }

    public function update($data,$question)
    {
        return $question->update($data);
    }
}