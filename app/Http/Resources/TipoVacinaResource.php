<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipoVacinaResource extends JsonResource
{
    /**
     * collection resource wrap
     * @var mixed
     */
    public static $collectionWrap = 'tipos_vacinas_info';

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
                'id' => $item->id,
                'nome' => $item->nome
            ];
        });

        return [self::$collectionWrap => $response];
    }
}
