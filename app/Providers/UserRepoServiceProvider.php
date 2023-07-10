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
        $this->app->bind('App\Repositories\User\UserInterface', 'App\Repositories\User\UserRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
