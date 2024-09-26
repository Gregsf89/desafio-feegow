<?php

namespace App\Contracts;

use App\Models\LoteVacina;
use Illuminate\Database\Eloquent\Collection;

interface LoteVacinaRepositoryInterface
{
    /**
     * Creates a new LoteVacina model and persists it
     * @param array $data
     * @return LoteVacina
     */
    public function create(array $data): LoteVacina;

    /**
     * Return all LoteVacina models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection;
}
