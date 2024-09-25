<?php

namespace App\Repositories;

use App\Models\LoteVacina;

interface LoteVacinaRepositoryInterface
{
    /**
     * Creates a new LoteVacina model and persists it
     * @param string $id
     * @return LoteVacina
     */
    public function create(array $data): LoteVacina;
}