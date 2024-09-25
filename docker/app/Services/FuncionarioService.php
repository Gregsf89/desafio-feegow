<?php

namespace App\Services;

use App\Models\Funcionario;
use App\Repositories\FuncionarioRepositoryInterface;
use App\Services\FuncionarioServiceInterface;

class FuncionarioService extends BaseService implements FuncionarioServiceInterface
{
    public function __construct(private FuncionarioRepositoryInterface $repositoryInterface)
    {
    }

    /**
     * Summary of getFuncionarioByCpf
     * @param string $cpf
     * @return Funcionario|null
     */
    public function getFuncionarioByCpf(string $cpf): ?Funcionario
    {
        return $this->repositoryInterface->getFuncionarioByCpf($cpf);
    }

    /**
     * createFuncionario
     * @param array $data
     * @return Funcionario
     */
    public function create(array $data): Funcionario
    {
        return $this->repositoryInterface->create($data);
    }
}