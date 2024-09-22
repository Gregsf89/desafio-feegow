<?php

namespace App\Http\Controllers;

use App\Http\Resources\FuncionarioResource;
use App\Http\Resources\ResourceInterface;
use App\Rules\ValidateCpf;
use App\Services\FuncionarioServiceInterface;
use Exception;
use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{
    public function __construct(
        private FuncionarioServiceInterface $serviceInterface
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
        $data = [
            'cpf' => $cpf
        ];

        $validator = Validator::make(
            $data,
            [
                'cpf' => [
                    'required',
                    'string',
                    'size:11',
                    new ValidateCpf()
                ],
            ],
            $this->customMessages
        );

        if ($validator->fails())
            throw new Exception($validator->errors(), 1000001);

        return (new FuncionarioResource(
            $this->serviceInterface->getFuncionarioByCpf($cpf)
        ))
            ->resolve();
    }
}
