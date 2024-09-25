<?php

namespace App\Services;

use App\Models\DoseVacina;

interface DoseVacinaServiceInterface
{
    /**
     * Create a new DoseVacina model and persist it
     * @param array $data
     * @return DoseVacina
     */
    public function create(array $data): DoseVacina;
}