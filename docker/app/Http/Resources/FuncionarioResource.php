<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FuncionarioResource extends JsonResource
{
    /**
     * reosurce wrap
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
        return [
            self::$wrap => [
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'data_nascimento' => $this->data_nascimento->format('Y-m-d'),
            ]
        ];
    }
}
