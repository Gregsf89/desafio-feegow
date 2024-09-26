<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BusinessServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Contracts\FuncionarioServiceInterface::class, \App\Services\FuncionarioService::class);
        $this->app->bind(\App\Contracts\LoteVacinaServiceInterface::class, \App\Services\LoteVacinaService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
