<?php

use App\Http\Controllers\ResourceController;

Route::controller(ResourceController::class)->prefix('resource')->group(function (\Illuminate\Routing\Router $router): void {
    $router->get('/comorbidades', 'getComorbidadeList')->name(name: 'resource.getComorbidadeList');
    $router->get('/tipos-vacinas', 'getTipoVacinaList')->name('resource.getTipoVacinaList');
});