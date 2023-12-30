<?php

namespace App\Providers;

use App\Repositories\Interfaces\QuestionCategoryRepositoryInterface;
use App\Repositories\QuestionCategoryRepository;
use Illuminate\Support\ServiceProvider;

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
       $this->app->bind(QuestionCategoryRepositoryInterface::class,QuestionCategoryRepository::class);
    }
}
