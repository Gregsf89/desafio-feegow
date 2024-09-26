<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoteVacinaResource extends JsonResource
{
    /**
     * collection resource wrap
     * @var mixed
     */
    public static $collectionWrap = 'lote_vacinas_info';

    /**
     * resource wrap
     * @var mixed
     */
    public static $wrap = 'lote_vacina_info';

    /**
     * Create a new anonymous resource paginated collection.
     *
     * @param  mixed  $resource
     * @return array<string, mixed>
     */
    public static function collection($resource): array
    {
        if (!$resource)
            return [];

        $response = [];
        $resource->each(function ($item) use (&$response) {
            $response[] = [
                'id' => strtoupper($item->id),
                'tipo_vacina' => $item->tipoVacina->nome,
                'data_validade' => $item->data_validade->format('Y-m-d'),
                'lote' => strtoupper($item->lote),
                'dose_unica' => (bool) $item->dose_unica
            ];
        });

        return [self::$collectionWrap => $response];
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (empty($this))
            return ['lote_vacina_nao_encontrado'];
        else
            return [
                self::$wrap => [
                    'id' => strtoupper($this->id),
                    'tipo_vacina' => $this->tipoVacina->nome,
                    'data_validade' => $this->data_validade->format('Y-m-d'),
                    'lote' => strtoupper($this->lote),
                    'dose_unica' => (bool) $this->dose_unica
                ]
            ];
    }
}
