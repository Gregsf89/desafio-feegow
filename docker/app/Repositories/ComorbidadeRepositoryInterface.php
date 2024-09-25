<?php

namespace App\Repositories;

use App\Models\Comorbidade;
use Illuminate\Database\Eloquent\Collection;

interface ComorbidadeRepositoryInterface
{
    /**
     * Return a a list of Comorbidade models
     * @return Collection
     */
    public function getListComorbidade(): Collection;

    /**
     * Return a Comorbidade model by its id
     * @param int $id
     * @return Comorbidade
     */
    public function getComorbidadeById(int $id): Comorbidade;
}