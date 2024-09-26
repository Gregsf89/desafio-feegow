<?php

namespace App\Services;

use App\Contracts\TipoVacinaRepositoryInterface;
use App\Contracts\TipoVacinaServiceInterface;

class TipoVacinaService extends BaseService implements TipoVacinaServiceInterface
{
    public function __construct(
        private readonly TipoVacinaRepositoryInterface $repositoryInterface
    ) {
    }

    /**
     * Return all LoteVacina models
     * @return array
     */
    public function getAll(): array
    {
        return $this->repositoryInterface->getAll();
    }
}
