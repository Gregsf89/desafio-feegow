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
        $this->app->bind(\App\Contracts\ComorbidadeServiceInterface::class, \App\Services\ComorbidadeService::class);
        $this->app->bind(\App\Contracts\FuncionarioServiceInterface::class, \App\Services\FuncionarioService::class);
        $this->app->bind(\App\Contracts\LoteVacinaServiceInterface::class, \App\Services\LoteVacinaService::class);
        $this->app->bind(\App\Contracts\TipoVacinaServiceInterface::class, \App\Services\TipoVacinaService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
