<?php

namespace App\Contracts;

interface ComorbidadeRepositoryInterface
{
    /**
     * Return all Comorbidade models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): array;
}