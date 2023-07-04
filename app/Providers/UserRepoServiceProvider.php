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

        $this->app->bind(UserRepository::class, function (Application $app) {
            return new UserRepository($app->make(UserService::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
