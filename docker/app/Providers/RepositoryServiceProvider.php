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
        $this->app->bind(\App\Contracts\FuncionarioRepositoryInterface::class, \App\Repositories\FuncionarioRepository::class);
        $this->app->bind(\App\Contracts\LoteVacinaRepositoryInterface::class, \App\Repositories\LoteVacinaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
