<?php

namespace App\Services;

use App\Contracts\ComorbidadeRepositoryInterface;
use App\Contracts\ComorbidadeServiceInterface;

class ComorbidadeService extends BaseService implements ComorbidadeServiceInterface
{
    public function __construct(
        private readonly ComorbidadeRepositoryInterface $repositoryInterface
    ) {
    }

    /**
     * Return all LoteVacina models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): array
    {
        return $this->repositoryInterface->getAll();
    }
}
