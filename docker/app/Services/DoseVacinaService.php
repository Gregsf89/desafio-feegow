<?php

namespace App\Services;

use App\Models\DoseVacina;
use App\Repositories\DoseVacinaRepositoryInterface;
use App\Services\DoseVacinaServiceInterface;

class DoseVacinaService extends BaseService implements DoseVacinaServiceInterface
{
    public function __construct(private DoseVacinaRepositoryInterface $repositoryInterface)
    {
    }

    public function create(array $data): DoseVacina
    {
        return $this->repositoryInterface->create($data);
    }
}