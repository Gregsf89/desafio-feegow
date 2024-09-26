<?php

namespace App\Contracts;

interface ComorbidadeRepositoryInterface
{
    /**
     * Return all Comorbidade models
     * @return array
     */
    public function getAll(): array;
}