<?php

namespace App\Services;

use App\Contracts\FuncionarioRepositoryInterface;
use App\Contracts\FuncionarioServiceInterface;
use App\Models\Funcionario;

class FuncionarioService extends BaseService implements FuncionarioServiceInterface
{
    public function __construct(
        private readonly FuncionarioRepositoryInterface $repositoryInterface
    ) {
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
     * @param ?array $dosesVacinaInfo
     * @return Funcionario
     */
    public function create(array $data, ?array $dosesVacinaInfo = []): Funcionario
    {
        $funcionario = $this->repositoryInterface->create(['cpf' => $data['cpf']], $data);

        isset($data['comorbidade_ids']) ? $funcionario->comorbidades()->sync($data['comorbidade_ids']) : null;

        if (is_array($dosesVacinaInfo) && !empty($dosesVacinaInfo))
            $funcionario->loteVacinas()->sync($dosesVacinaInfo);

        return $funcionario;
    }
}