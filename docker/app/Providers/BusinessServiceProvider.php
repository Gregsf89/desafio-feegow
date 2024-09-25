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
        $this->app->bind(\App\Services\DoseVacinaServiceInterface::class, \App\Services\DoseVacinaService::class);
        $this->app->bind(\App\Services\FuncionarioServiceInterface::class, \App\Services\FuncionarioService::class);
        $this->app->bind(\App\Services\LoteVacinaServiceInterface::class, \App\Services\LoteVacinaService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
