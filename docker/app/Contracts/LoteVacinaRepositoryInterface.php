<?php

namespace App\Contracts;

use App\Models\LoteVacina;

interface LoteVacinaRepositoryInterface
{
    /**
     * Creates a new LoteVacina model and persists it
     * @param array $data
     * @return LoteVacina
     */
    public function create(array $data): LoteVacina;
}
