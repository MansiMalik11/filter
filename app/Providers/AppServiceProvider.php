<?php

namespace App\Providers;

use App\Services\UserService;
use App\Repositories\UserRepository;
use App\Services\Contracts\UserServiceInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(\App\Services\UserService::class, function ($app) {
        //     return new \App\Services\UserService();
        // });
         $this->app->bind(UserServiceInterface::class, UserService::class);
         $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
