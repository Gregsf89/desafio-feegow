<?php

namespace App\Repositories;

use App\Contracts\LoteVacinaRepositoryInterface;
use App\Models\LoteVacina;
use Illuminate\Database\Eloquent\Collection;

class LoteVacinaRepository extends BaseRepository implements LoteVacinaRepositoryInterface
{
    /**
     * Creates a new LoteVacina model and persists it
     * @param array $data
     * @return LoteVacina
     */
    public function create(array $data): LoteVacina
    {
        return LoteVacina::updateOrCreate($data, $data)->fresh();
    }

    /**
     * Return all LoteVacina models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return LoteVacina::all();
    }
}
