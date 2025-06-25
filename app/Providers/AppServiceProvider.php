<?php

namespace App\Providers;

use App\Actions\Auth\LoginResponse;
use Illuminate\Support\ServiceProvider;
use App\Actions\Auth\LoginResponse as CustomLoginResponse;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
     $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
