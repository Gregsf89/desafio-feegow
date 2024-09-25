<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFuncionarioRequest;
use App\Http\Resources\FuncionarioResource;
use App\Rules\ValidateCpf;
use App\Services\FuncionarioServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Http\Request;
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
            'comorbidades',
            'doses_vacina_info'
        ]);

        if (isset($data['comorbidades']) && is_array($data['comorbidades']) && !empty($data['comorbidades'])) {
            $comorbidadesData = $data['comorbidades'] ?? null;
            unset($data['comorbidades']);
        }

        if (isset($data['doses_vacina_info']) && is_array($data['doses_vacina_info']) && !empty($data['doses_vacina_info'])) {
            $dosesVacinaData = $data['doses_vacina_info'] ?? null;
            unset($data['doses_vacina_info']);
        }
        dd(1);

        return (new FuncionarioResource(
            $this->serviceInterface->create(
                $data
            )
        ))->resolve();
    }
}
