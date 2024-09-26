<?php

namespace App\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RelatorioServiceInterface
{
    /**
     * Return all Relatorio models
     * @param int $page
     * @param int $limit
     * @param bool $vacinated
     * @return array
     */
    public function getRelatorioPaginated(int $page = 1, int $limit = 10, bool $vacinated = false): LengthAwarePaginator;
}