<?php

namespace App\Http\Controllers;

use App\Contracts\ComorbidadeServiceInterface;
use App\Contracts\TipoVacinaServiceInterface;
use App\Http\Resources\ComorbidadeResource;
use App\Http\Resources\TipoVacinaResource;

class ResourceController extends Controller
{
    public function __construct(
        private readonly ComorbidadeServiceInterface $comorbidadeServiceInterface,
        private readonly TipoVacinaServiceInterface $tipoVacinaServiceInterface
    ) {
    }

    /**
     * @OA\Get(
     *  path="/api/v1/comorbidades",
     *  summary="GET Comorbidade List",
     *  description="return a list of Comorbidade",
     *  operationId="resource.getComorbidadeList",
     *  tags={"Resource"},
     *  security={{"default": {}}},
     *  @OA\Response(
     *      response=200,
     *      description="Comorbidade Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="comorbidades_info", type="array",
     *                      @OA\Items(type="object",
     *                          @OA\Property(property="id", type="integer", example=1),
     *                          @OA\Property(property="nome", type="string", example="Diabetes Melitus")
     *                      )
     *                  )
     *              ),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
    public function getComorbidadeList(): array
    {
        return \App\Models\Comorbidade::withoutRelations()->all()->toArray();
        return //ComorbidadeResource::collection(
            $this->comorbidadeServiceInterface->getAll();
        // );
    }

    /**
     * @OA\Get(
     *  path="/api/v1/tipos-vacinas",
     *  summary="GET TipoVacina List",
     *  description="return a list of TipoVacina",
     *  operationId="resource.getTipoVacinaList",
     *  tags={"Resource"},
     *  security={{"default": {}}},
     *  @OA\Response(
     *      response=200,
     *      description="TipoVacina Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="tipos_vacinas_info", type="array",
     *                      @OA\Items(type="object",
     *                          @OA\Property(property="id", type="integer", example=1),
     *                          @OA\Property(property="nome", type="string", example="Coronavac")
     *                      )
     *                  )
     *              ),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
    public function getTipoVacinaList(): array
    {
        return TipoVacinaResource::collection(
            $this->tipoVacinaServiceInterface->getAll()
        );
    }
}
