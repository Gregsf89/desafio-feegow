<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComorbidadeResource extends JsonResource
{
    /**
     * collection resource wrap
     * @var mixed
     */
    public static $collectionWrap = 'comorbidades_info';

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
