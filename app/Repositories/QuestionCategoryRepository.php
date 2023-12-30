<?php

namespace App\Repositories;

use App\Models\QuestionCategory;
use App\Repositories\Interfaces\QuestionCategoryRepositoryInterface;

Class QuestionCategoryRepository implements QuestionCategoryRepositoryInterface
{
    public function getAll()
    {
        return QuestionCategory::paginate(10);
    }

    public function store($data)
    {
        return QuestionCategory::create($data);
    }

    public function update($data,$questionCategory)
    {
        return $questionCategory->update($data);
    }
}