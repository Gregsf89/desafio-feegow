<?php

namespace App\Contracts;

interface ComorbidadeServiceInterface
{
    /**
     * Return all Comorbidade models
     * @return array
     */
    public function getAll(): array;
}