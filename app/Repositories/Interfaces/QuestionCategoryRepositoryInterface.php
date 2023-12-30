<?php

namespace App\Repositories\Interfaces;

Interface QuestionCategoryRepositoryInterface
{
    public function getAll();

    public function store($data);

    public function update($data,$questionCategory);
}