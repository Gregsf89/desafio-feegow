<?php

namespace App\Contracts;

interface TipoVacinaServiceInterface
{
    /**
     * Return all TipoVacina models
     * @return array
     */
    public function getAll(): array;
}