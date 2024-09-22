<?php

namespace App\Services;

use App\Models\Funcionario;

interface FuncionarioServiceInterface
{
    public function getFuncionarioByCpf(string $cpf): ?Funcionario;
}