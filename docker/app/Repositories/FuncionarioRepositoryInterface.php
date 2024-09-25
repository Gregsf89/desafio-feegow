<?php

namespace App\Repositories;

use App\Models\Funcionario;

interface FuncionarioRepositoryInterface
{
    /**
     * Return a Funcionario model byt its cpf and its related data
     * @param string $cpf
     * @return null|Funcionario
     */
    public function getFuncionarioByCpf(string $cpf): ?Funcionario;

    /**
     * Create a new Funcionario model and persist it
     * @param array $data
     * @return Funcionario
     */
    public function create(array $data): Funcionario;
}