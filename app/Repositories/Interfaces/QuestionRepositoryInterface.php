<?php

namespace App\Repositories\Interfaces;

Interface QuestionRepositoryInterface
{
    public function all();

    public function store($data);

    public function update($data,$question);
}