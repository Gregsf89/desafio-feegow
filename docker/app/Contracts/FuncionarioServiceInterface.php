<?php

namespace App\Contracts;

use App\Models\Funcionario;

interface FuncionarioServiceInterface
{
    /**
     * Return a Funcionario model by its cpf and its related data
     * @param string $cpf
     * @return Funcionario|null
     */
    public function getFuncionarioByCpf(string $cpf): ?Funcionario;

    /**
     * Create a new Funcionario model and persist it
     * @param array $data
     * @param ?array $dosesVacinaInfo
     * @return Funcionario
     */
    public function create(array $data, ?array $dosesVacinaInfo = []): Funcionario;
}
