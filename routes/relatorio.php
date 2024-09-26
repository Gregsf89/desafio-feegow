<?php

use App\Http\Controllers\RelatorioController;

Route::controller(RelatorioController::class)->prefix('relatorios')->group(function (\Illuminate\Routing\Router $router): void {
    $router->get('/page/{page}/limit/{limit}/vacinated/{vacinated}', 'getRelatorioFuncionarios')
        ->whereNumber('page')
        ->whereNumber('limit')
        ->whereIn('vacinated', [0, 1])
        ->name('relatorio.getRelatorioFuncionarios');
});