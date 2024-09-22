<?php

namespace App\Repositories;

use App\Models\Funcionario;

class FuncionarioRepository extends BaseRepository implements FuncionarioRepositoryInterface
{
    /**
     * getFuncionarioByCpf
     * @param string $cpf
     * @return null|\App\Models\Funcionario
     */
    public function getFuncionarioByCpf(string $cpf): ?Funcionario
    {
        return Funcionario::where('cpf', $cpf)->first();
    }
}