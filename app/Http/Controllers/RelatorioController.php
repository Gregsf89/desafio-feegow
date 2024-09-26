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

    /**
     * @OA\Get(
     *  path="/api/v1/relatorios/page/{page}/limit/{limit}/vacinated/{vacinated}",
     *  parameters={{
     *      "name": "page",
     *      "in": "path",
     *      "description": "page number",
     *      "required": true,
     *      "schema": {
     *      "type": "int"
     *  }}},
     *  parameters={{
     *      "name": "limit",
     *      "in": "path",
     *      "description": "limit of itens per page",
     *      "required": true,
     *      "schema": {
     *      "type": "int"
     *  }}},
     *  parameters={{
     *      "name": "vacinated",
     *      "in": "path",
     *      "description": "bool as 0 or 1 to filter vacinated or not",
     *      "required": true,
     *      "schema": {
     *      "type": "int"
     *  }}},
     *  summary="GET Relatorio Funcionarios",
     *  description="return a paginated collection of Funcionarios by rule vacinated",
     *  operationId="relatorio.getRelatorioFuncionarios",
     *  tags={"Relatorio"},
     *  security={{"default": {}}},
     *  @OA\Response(
     *      response=200,
     *      description="Relatorio Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="relatorio_info", type="array",
     *                      @OA\Items(type="object",
     *                          @OA\Property(property="cpf", type="string", example="999********"),
     *                          @OA\Property(property="nome", type="string", example="Joao da Silva"),
     *                          @OA\Property(property="data_nascimento", type="string", example="1972-01-01"),
     *                          @OA\Property(property="comorbidade", type="boolean", example=true),
     *                          @OA\Property(property="vacinado", type="boolean", example=false)
     *                      )
     *                  )
     *              ),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
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
