<?php

use App\Http\Controllers\FuncionarioController;

Route::controller(FuncionarioController::class)->prefix('funcionario')->group(function (\Illuminate\Routing\Router $router): void {
    $router->get('/{cpf}', 'getFuncionario')->whereAlphaNumeric('cpf')->name('funcionario.getFuncionario');
    $router->post('/', 'createFuncionario')->name('funcionario.createFuncionario');
});