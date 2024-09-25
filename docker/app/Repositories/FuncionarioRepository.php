<?php

namespace App\Repositories;

use App\Models\Funcionario;

class FuncionarioRepository extends BaseRepository implements FuncionarioRepositoryInterface
{
    /**
     * getFuncionarioByCpf
     * @param string $cpf
     * @return null|Funcionario
     */
    public function getFuncionarioByCpf(string $cpf): ?Funcionario
    {
        return Funcionario::where('cpf', $cpf)->first();
    }

    /**
     * createFuncionarioByCpf
     * @param array $data
     * @return Funcionario
     */
    public function create(array $data): Funcionario
    {
        return Funcionario::create($data)->fresh();
    }
}