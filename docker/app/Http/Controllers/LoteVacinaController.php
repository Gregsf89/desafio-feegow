<?php

namespace App\Http\Controllers;

use App\Contracts\LoteVacinaServiceInterface;
use App\Http\Resources\LoteVacinaResource;
use Illuminate\Http\Request;

class LoteVacinaController extends Controller
{
    public function __construct(
        private readonly LoteVacinaServiceInterface $serviceInterface
    ) {
    }

    /**
     * @OA\Get(
     *  path="/api/v1/lote-vacinas",
     *  summary="GET Lote Vacina List",
     *  description="return a list of Lote Vacina",
     *  operationId="lote-vacinas.getLoteVacinaList",
     *  tags={"LoteVacina"},
     *  security={{"default": {}}},
     *  @OA\Response(
     *      response=200,
     *      description="Lote Vacina Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="lote_vacinas_info", type="array",
     *                      @OA\Items(type="object",
     *                          @OA\Property(property="id", type="string", example="01j8nbna2en17vtbbjmn31ahdy"),
     *                          @OA\Property(property="lote", type="string", example="ACB123QWE"),
     *                          @OA\Property(property="tipo_vacina", type="string", example="coronavac"),
     *                          @OA\Property(property="data_validade", type="boolean", example="2024-12-12"),
     *                          @OA\Property(property="dose_unica", type="boolean", example=false)
     *                      )
     *                  )
     *              ),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
    public function getLoteVacinaList(): array
    {
        return LoteVacinaResource::collection($this->serviceInterface->getAll());
    }
}
