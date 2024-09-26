<?php

namespace App\Services;

use App\Contracts\ComorbidadeServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ComorbidadeService extends BaseService implements ComorbidadeServiceInterface
{
    public function __construct(
        private readonly ComorbidadeServiceInterface $repositoryInterface
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
