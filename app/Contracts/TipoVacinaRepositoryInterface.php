<?php

namespace App\Contracts;

interface TipoVacinaRepositoryInterface
{
    /**
     * Return all TipoVacina models
     * @return array
     */
    public function getAll(): array;
}