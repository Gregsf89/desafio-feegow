<?php

namespace App\Repositories;

use App\Models\Comorbidade;
use Illuminate\Database\Eloquent\Collection;

class ComorbidadeRepository extends BaseRepository implements ComorbidadeRepositoryInterface
{
    /**
     * Return a a list of Comorbidade models
     * @return Collection
     */
    public function getListComorbidade(): Collection
    {
        return Comorbidade::all();
    }

    /**
     * Return a Comorbidade model by its id
     * @param int $id
     * @return Comorbidade
     */
    public function getComorbidadeById(int $id): Comorbidade
    {
        return Comorbidade::find($id);
    }
}