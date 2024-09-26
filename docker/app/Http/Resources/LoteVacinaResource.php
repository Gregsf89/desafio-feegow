<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoteVacinaResource extends JsonResource
{
    /**
     * resource wrap
     * @var mixed
     */
    public static $collectionWrap = 'lote_vacinas_info';

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
                'tipo_vacina_id' => $item->tipoVacina->nome,
                'data_validade' => $item->data_validade->format('Y-m-d'),
                'lote' => strtoupper($item->lote),
                'dose_unica' => (bool) $item->dose_unica
            ];
        });

        return [self::$collectionWrap => $response];
    }
}
