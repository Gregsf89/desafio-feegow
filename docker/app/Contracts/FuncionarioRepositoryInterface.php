<?php

namespace App\Contracts;

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
     * @param array $anchor
     * @param array $payload
     * @return Funcionario
     */
    public function create(array $anchor, array $payload): Funcionario;
}
