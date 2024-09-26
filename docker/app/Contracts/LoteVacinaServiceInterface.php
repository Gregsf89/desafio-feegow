<?php

namespace App\Contracts;

use App\Models\LoteVacina;
use Illuminate\Database\Eloquent\Collection;

interface LoteVacinaServiceInterface
{
    /**
     * Creates a new LoteVacina model and persists it
     * @param array $data
     * @return LoteVacina
     */
    public function create(array $data): LoteVacina;

    /**
     * Creates a new LoteVacina model and persists it
     * @param array $data
     * @return array
     */
    public function createLoteFromFuncionario(array $data): array;

    /**
     * Return all LoteVacina models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection;
}
