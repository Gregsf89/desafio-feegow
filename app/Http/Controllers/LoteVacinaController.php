<?php

namespace App\Http\Controllers;

use App\Contracts\LoteVacinaServiceInterface;
use App\Http\Requests\CreateLoteVacinaRequest;
use App\Http\Requests\GetLoteVacinaRequest;
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
     *                          @OA\Property(property="id", type="string", example="01J8NBNA2EN17VTBBJMN31AHDY"),
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

    /**
     *  @OA\Post(
     *  path="/api/v1/lote-vacina",
     *  summary="POST Lote Vacina",
     *  description="create a LoteVacina",
     *  operationId="lote-vacina.createLoteVacina",
     *  tags={"LoteVacina"},
     *  security={{"default": {}}},
     *  @OA\RequestBody(
     *    description="LoteVacina Request Body Data",
     *    @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *          @OA\Property(property="tipo_vacina_id", type="integer", example=1),
     *          @OA\Property(property="data_validade", type="string", example="2021-09-21"),
     *          @OA\Property(property="lote", type="string", example="BFQ70RRV3X"),
     *          @OA\Property(property="dose_unica", type="string", example=false)
     *      )
     *  )),
     *  @OA\Response(
     *      response=200,
     *      description="LoteVacina Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="lote_vacina_info", type="object",
     *                      @OA\Property(property="id", type="integer", example="01J8NBNA2EN17VTBBJMN31AHDY"),
     *                      @OA\Property(property="tipo_vacina", type="integer", example=1),
     *                      @OA\Property(property="data_validade", type="string", example="2021-09-21"),
     *                      @OA\Property(property="lote", type="string", example="BFQ70RRV3X"),
     *                      @OA\Property(property="dose_unica", type="string", example=false)
     *                  )
     *              ),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
    public function createLoteVacina(CreateLoteVacinaRequest $request): array
    {
        $data = $request->safe()->only([
            'tipo_vacina_id',
            'data_validade',
            'lote',
            'dose_unica'
        ]);

        return (new LoteVacinaResource(
            $this->serviceInterface->create(
                $data
            )
        ))->resolve();
    }

    /**
     * @OA\Get(
     *  path="/api/v1/lote-vacina/{id}",
     *  parameters={{
     *      "name": "id",
     *      "in": "path",
     *      "description": "ID of Lote Vacina",
     *      "required": true,
     *      "schema": {
     *      "type": "string"
     *  }}},
     *  summary="GET Lote Vacina",
     *  description="return a Lote Vacina",
     *  operationId="lote-vacina.getLoteVacina",
     *  tags={"LoteVacina"},
     *  security={{"default": {}}},
     *  @OA\Response(
     *      response=200,
     *      description="Lote Vacina Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="lote_vacina_info", type="object",
     *                      @OA\Property(property="id", type="string", example="01J8NBNA2EN17VTBBJMN31AHDY"),
     *                      @OA\Property(property="lote", type="string", example="ACB123QWE"),
     *                      @OA\Property(property="tipo_vacina", type="string", example="coronavac"),
     *                      @OA\Property(property="data_validade", type="boolean", example="2024-12-12"),
     *                      @OA\Property(property="dose_unica", type="boolean", example=false)
     *                  )
     *              ),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
    public function getLoteVacina(GetLoteVacinaRequest $request): array
    {
        $data = $request->safe()->only([
            'id'
        ]);

        return (new LoteVacinaResource(
            $this->serviceInterface->getLoteVacinaById(
                $data['id']
            )
        ))->resolve();
    }
}
