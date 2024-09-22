<?php

namespace App\Repositories;

use App\Models\Funcionario;

interface FuncionarioRepositoryInterface
{
    public function getFuncionarioByCpf(string $cpf): ?Funcionario;
}