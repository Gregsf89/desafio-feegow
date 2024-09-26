<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class FuncionarioResource extends JsonResource
{
    /**
     * resource wrap
     * @var mixed
     */
    public static $wrap = 'funcionario_info';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (empty($this))
            return ['funcionario_nao_encontrado'];
        else
            return [
                self::$wrap => [
                    'nome' => $this->nome,
                    'cpf' => Str::mask($this->cpf, '*', 3),
                    'data_nascimento' => $this->data_nascimento->format('Y-m-d'),
                    'comorbidade' => $this->comorbidades->isNotEmpty(),
                    'vacinado' => $this->dosesVacina->isNotEmpty(),
                    'primeira_dose' => $this->dosesVacina->where('dose', '1')->first()?->data_aplicacao->format('Y-m-d'),
                    'segunda_dose' => $this->dosesVacina->where('dose', '2')->first()?->data_aplicacao->format('Y-m-d'),
                    'terceira_dose' => $this->dosesVacina->where('dose', '3')->first()?->data_aplicacao->format('Y-m-d'),
                ]
            ];
    }
}
