<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Services\FuncionarioServiceInterface::class, \App\Services\FuncionarioService::class);
        $this->app->bind(\App\Repositories\FuncionarioRepositoryInterface::class, \App\Repositories\FuncionarioRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
