<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TaskService;
use App\Services\Repositories\TaskRepository;
use Illuminate\Contracts\Foundation\Application;
class TaskRepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repositories\Task\TaskInterface', 'App\Repositories\Task\TaskRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
