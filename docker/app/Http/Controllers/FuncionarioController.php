<?php

namespace App\Http\Controllers;

use App\Contracts\FuncionarioServiceInterface;
use App\Contracts\LoteVacinaServiceInterface;
use App\Http\Requests\CreateFuncionarioRequest;
use App\Http\Requests\GetFuncionarioRequest;
use App\Http\Resources\FuncionarioResource;

class FuncionarioController extends Controller
{
    public function __construct(
        private readonly FuncionarioServiceInterface $serviceInterface,
        private readonly LoteVacinaServiceInterface $loteVacinaServiceInterface
    ) {
    }

    /**
     * @OA\Get(
     *  path="/api/funcionario/{cpf}",
     *  parameters={{
     *      "name": "cpf",
     *      "in": "path",
     *      "description": "CPF do funcionário",
     *      "required": true,
     *      "schema": {
     *      "type": "string"
     *  }}},
     *  summary="GET Funcionario info",
     *  description="return the funcionario info",
     *  operationId="funcionario.getFuncionario",
     *  tags={"Funcionario"},
     *  security={{"default": {}}},
     *  @OA\Response(
     *      response=200,
     *      description="Funcionario Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="funcionario_info", type="object",
     *                      @OA\Property(property="nome", type="string", example="João da Silva"),
     *                      @OA\Property(property="cpf", type="string", example="999********"),
     *                      @OA\Property(property="data_nascimento", type="string", example="1990-01-01"),
     *                      @OA\Property(property="comorbidade", type="boolean", example=false),
     *                      @OA\Property(property="vacinado", type="boolean", example=false),
     *                      @OA\Property(property="primeira_dose", type="string", example=null),
     *                      @OA\Property(property="segunda_dose", type="string", example=null),
     *                      @OA\Property(property="terceira_dose", type="string", example=null)
     *                  )
     *              ),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
    public function getFuncionario(GetFuncionarioRequest $request): array
    {
        $data = $request->safe()->only([
            'cpf'
        ]);

        return (new FuncionarioResource(
            $this->serviceInterface->getFuncionarioByCpf($data['cpf'])
        ))->resolve();
    }

    /**
     *  @OA\Post(
     *  path="/api/funcionario",
     *  summary="POST Funcionario",
     *  description="create a funcionario",
     *  operationId="funcionario.createFuncionario",
     *  tags={"Funcionario"},
     *  security={{"default": {}}},
     *  @OA\RequestBody(
     *    description="Funcionario Request Body Data",
     *    @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *          @OA\Property(property="nome", type="string", example="João da Silva"),
     *          @OA\Property(property="cpf", type="string", example="99999999999"),
     *          @OA\Property(property="data_nascimento", type="string", example="1990-01-01"),
     *          @OA\Property(property="comorbidades", type="array",
     *              @OA\Items(type="integer", example=1)
     *          ),
     *          @OA\Property(property="doses_vacina_info", type="array",
     *              @OA\Items(type="object",
     *                  @OA\Property(property="lote_vacina_info", type="object",
     *                      @OA\Property(property="id", type="string", example="01J8JZRVQXWVVAS82KMHBQ7V7G"),
     *                      @OA\Property(property="tipo_vacina_id", type="integer", example=1),
     *                      @OA\Property(property="data_validade", type="string", example="2021-09-21"),
     *                      @OA\Property(property="lote", type="string", example="BFQ70RRV3X"),
     *                      @OA\Property(property="dose_unica", type="string", example=false)
     *                  ),
     *                  @OA\Property(property="dose", type="integer", example=1),
     *                  @OA\Property(property="data_aplicacao", type="string", example="2021-09-21")
     *              )
     *          )
     *      )
     *  )
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Funcionario Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="funcionario_info", type="object",
     *                      @OA\Property(property="nome", type="string", example="João da Silva"),
     *                      @OA\Property(property="cpf", type="string", example="999********"),
     *                      @OA\Property(property="data_nascimento", type="string", example="1990-01-01"),
     *                      @OA\Property(property="comorbidade", type="boolean", example=false),
     *                      @OA\Property(property="vacinado", type="boolean", example=false),
     *                      @OA\Property(property="primeira_dose", type="string", example=null),
     *                      @OA\Property(property="segunda_dose", type="string", example=null),
     *                      @OA\Property(property="terceira_dose", type="string", example=null)
     *                  )
     *              ),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
    public function createFuncionario(CreateFuncionarioRequest $request): array
    {
        $data = $request->safe()->only([
            'cpf',
            'nome',
            'data_nascimento',
            'comorbidade_ids',
            'doses_vacina_info'
        ]);

        if (isset($data['doses_vacina_info'])) {
            $dosesVacinaInfo = $this->loteVacinaServiceInterface->createLoteFromFuncionario($data['doses_vacina_info']);
            unset($data['doses_vacina_info']);
        }

        return (new FuncionarioResource(
            $this->serviceInterface->create(
                $data,
                $dosesVacinaInfo ?? []
            )
        ))->resolve();
    }
}
