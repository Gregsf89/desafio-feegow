<?php

namespace App\Repositories;

use App\Contracts\TipoVacinaRepositoryInterface;
use App\Models\TipoVacina;

class TipoVacinaRepository extends BaseRepository implements TipoVacinaRepositoryInterface
{
    /**
     * Return all TipoVacina models
     * @return array
     */
    public function getAll(): array
    {
        return TipoVacina::all()->toArray();
    }
}
