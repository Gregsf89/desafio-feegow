<?php

namespace App\Services;

use App\Contracts\RelatorioServiceInterface;
use App\Contracts\RelatorioRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RelatorioService extends BaseService implements RelatorioServiceInterface
{
    public function __construct(
        private readonly RelatorioRepositoryInterface $repositoryInterface
    ) {
    }

    /**
     * Return a paginated list of funcionarios
     * @param int $page
     * @param int $limit
     * @param bool $vacinated
     * @return LengthAwarePaginator
     */
    public function getRelatorioPaginated(int $page = 1, int $limit = 10, bool $vacinated = false): LengthAwarePaginator
    {
        return $this->repositoryInterface->getRelatorioPaginated($page, $limit, $vacinated);
    }
}
