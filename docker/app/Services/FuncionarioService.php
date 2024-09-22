<?php

namespace App\Services;

use App\Models\Funcionario;
use App\Services\FuncionarioServiceInterface;

class FuncionarioService extends BaseService implements FuncionarioServiceInterface
{

    public function __construct(
    ) {
    }

    public function getFuncionarioByCpf(string $cpf): ?Funcionario
    {
        return Funcionario::where('cpf', $cpf)->first();
    }
}