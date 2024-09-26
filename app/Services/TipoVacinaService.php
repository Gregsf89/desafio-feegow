<?php

namespace App\Services;

use App\Contracts\TipoVacinaServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class TipoVacinaService extends BaseService implements TipoVacinaServiceInterface
{
    public function __construct(
        private readonly TipoVacinaServiceInterface $repositoryInterface
    ) {
    }

    /**
     * Return all LoteVacina models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return $this->repositoryInterface->getAll();
    }
}
