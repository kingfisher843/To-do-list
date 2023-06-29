<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserRepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repositories\UserInterface', 'App\Repositories\UserRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
