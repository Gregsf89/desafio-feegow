<?php

namespace App\Services;

use App\Models\LoteVacina;

interface LoteVacinaServiceInterface
{
    /**
     * Create a new LoteVacina model and persist it
     * @param array $data
     * @return LoteVacina
     */
    public function create(array $data): LoteVacina;
}