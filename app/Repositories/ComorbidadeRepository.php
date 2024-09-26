<?php

namespace App\Repositories;

use App\Contracts\ComorbidadeRepositoryInterface;
use App\Models\Comorbidade;

class ComorbidadeRepository extends BaseRepository implements ComorbidadeRepositoryInterface
{
    /**
     * Return all Comorbidade models
     * @return array
     */
    public function getAll(): array
    {
        return Comorbidade::all()->toArray();
    }
}
