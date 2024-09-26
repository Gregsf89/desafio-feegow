<?php

namespace App\Repositories;

use App\Contracts\LoteVacinaRepositoryInterface;
use App\Models\LoteVacina;

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
}
