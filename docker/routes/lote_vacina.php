<?php

use App\Http\Controllers\LoteVacinaController;

Route::controller(LoteVacinaController::class)->group(function (\Illuminate\Routing\Router $router): void {
    $router->prefix('lote-vacinas')->group(function (\Illuminate\Routing\Router $router): void {
        $router->get('/', 'getLoteVacinaList')->name('lote-vacinas.getLoteVacinaList');
    });
    $router->prefix('lote-vacina')->group(function (\Illuminate\Routing\Router $router): void {
        $router->get('/{id}', 'getLoteVacina')->whereAlphaNumeric('id')->name('lote-vacina.getLoteVacina');
        $router->post('/', 'createLoteVacina')->name('lote-vacina.createLoteVacina');
    });
});