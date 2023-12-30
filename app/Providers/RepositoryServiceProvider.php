<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\QuestionRepository;
use App\Repositories\QuestionCategoryRepository;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Repositories\Interfaces\QuestionCategoryRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(QuestionCategoryRepositoryInterface::class, QuestionCategoryRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
    }
}
