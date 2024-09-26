<?php

namespace App\Contracts;

interface ComorbidadeServiceInterface
{
    /**
     * Return all Comorbidade models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): array;
}