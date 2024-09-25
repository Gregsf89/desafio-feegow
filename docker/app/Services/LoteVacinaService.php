<?php

namespace App\Services;

use App\Models\LoteVacina;
use App\Repositories\LoteVacinaRepositoryInterface;
use App\Services\LoteVacinaServiceInterface;

class LoteVacinaService extends BaseService implements LoteVacinaServiceInterface
{
    public function __construct(private LoteVacinaRepositoryInterface $repositoryInterface)
    {
    }

    public function create(array $data): LoteVacina
    {
        return $this->repositoryInterface->create($data);
    }
}