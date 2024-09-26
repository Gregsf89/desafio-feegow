<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ComorbidadeServiceInterface
{
    /**
     * Return all Comorbidade models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): array;
}