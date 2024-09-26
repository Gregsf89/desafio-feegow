<?php

namespace App\Repositories;

use App\Contracts\TipoVacinaRepositoryInterface;
use App\Models\TipoVacina;
use Illuminate\Database\Eloquent\Collection;

class TipoVacinaRepository extends BaseRepository implements TipoVacinaRepositoryInterface
{
    /**
     * Return all TipoVacina models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return TipoVacina::all();
    }
}
