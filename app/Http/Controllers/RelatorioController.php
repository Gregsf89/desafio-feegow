<?php

namespace App\Http\Controllers;

use App\Contracts\RelatorioServiceInterface;
use App\Http\Requests\RelatorioPaginatedRequest;
use App\Http\Resources\RelatorioResource;

class RelatorioController extends Controller
{
    public function __construct(
        private readonly RelatorioServiceInterface $comorbidadeRepository
    ) {
    }

    public function getRelatorioFuncionarios(RelatorioPaginatedRequest $request): array
    {
        $data = $request->safe()->only([
            'page',
            'limit',
            'vacinated'
        ]);

        return RelatorioResource::collectionPaginated(
            $this->comorbidadeRepository->getRelatorioPaginated(
                $data['page'] ?? 1,
                $data['limit'] ?? 10,
                (bool) $data['vacinated'] ?? false
            )
        );
    }
}
