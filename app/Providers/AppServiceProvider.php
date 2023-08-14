<?php

namespace App\Providers;

use App\Contracts\Services\ImageServiceInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Services\ImageService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
