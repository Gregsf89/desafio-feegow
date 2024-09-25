<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Repositories\DoseVacinaRepositoryInterface::class, \App\Repositories\DoseVacinaRepository::class);
        $this->app->bind(\App\Repositories\FuncionarioRepositoryInterface::class, \App\Repositories\FuncionarioRepository::class);
        $this->app->bind(\App\Repositories\LoteVacinaRepositoryInterface::class, \App\Repositories\LoteVacinaRepository::class);
        $this->app->bind(\App\Repositories\ComorbidadeRepositoryInterface::class, \App\Repositories\ComorbidadeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
