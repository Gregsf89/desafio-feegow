<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{
    public function __construct(
    ) {
    }

    /**
     *  @OA\Get(
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
     *  @OA\RequestBody(
     *      description="Funcionario Request Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="program_id", type="string", example='01ARZ3NDEKTSV4RRFFQ69G5FAV'),
     *          )
     *      )
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Funcionario Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="object", example={"code": "01J3N7B5Q4QQFPXXYD53AJN9MK", "program_id": 1, "created_at": "2024-07-15 10:34:44"}),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
    public function getFuncionario(string $cpf): array
    {
        // $funcionario = \App\Models\Funcionario::first();
        $funcionario = \App\Models\Funcionario::factory()->hasComorbidades(3, function (array $attributes, \App\Models\Funcionario $funcionario): array {
            return ['cpf_funcionario' => $funcionario->cpf];
        })->create();

        return ['funcionario_info' => $funcionario->toArray()];
    }
}
