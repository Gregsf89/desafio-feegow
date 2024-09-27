<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class RelatorioResource extends JsonResource
{
    /**
     * collection resource wrap
     * @var mixed
     */
    public static $collectionWrap = 'relatorio_info';

    /**
     * Create a new anonymous resource paginated collection.
     *
     * @param  mixed  $resource
     * @return array<string, mixed>
     */
    public static function collectionPaginated($resource): array
    {
        if (!$resource)
            return [];

        $body = [];
        $resource->each(function ($item) use (&$body) {
            $body[] = [
                'cpf' => Str::mask($item->cpf, '*', 3),
                'nome' => $item->nome,
                'data_nascimento' => $item->data_nascimento->format('Y-m-d'),
                'comorbidade' => (bool) $item->comorbidade,
                'vacinado' => (bool) $item->vacinado
            ];
        });

        return [
            self::$collectionWrap => $body,
            'total' => $resource->total(),
            'last_page' => $resource->lastPage(),
            'current_page' => $resource->currentPage()
        ];
    }
}
