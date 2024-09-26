<?php

namespace App\Repositories;

use App\Contracts\FuncionarioRepositoryInterface;
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
        return Funcionario::find($cpf);
    }

    /**
     * createFuncionarioByCpf
     * @param array $anchor
     * @param array $payload
     * @return Funcionario
     */
    public function create(array $anchor, array $payload): Funcionario
    {
        return Funcionario::updateOrCreate($anchor, $payload)->fresh();
    }
}
