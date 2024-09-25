<?php

namespace App\Repositories;

use App\Models\DoseVacina;

interface DoseVacinaRepositoryInterface
{
    /**
     * Creates a new DoseVacina model and persists it
     * @param string $id
     * @return DoseVacina
     */
    public function create(array $data): DoseVacina;
}