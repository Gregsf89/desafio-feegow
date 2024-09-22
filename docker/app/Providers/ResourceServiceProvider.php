<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResourceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(\App\Http\Resources\ResourceInterface::class, \App\Http\Resources\FuncionarioResource::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
