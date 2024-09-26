<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface TipoVacinaServiceInterface
{
    /**
     * Return all TipoVacina models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection;
}