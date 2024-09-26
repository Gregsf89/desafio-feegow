<?php

namespace App\Models;

class TipoVacina extends BaseModel
{
    /**
     * table name
     * @var string
     */
    protected $table = 'tipo_vacinas';

    /**
     * if the model uses timestamps
     * @var bool
     */
    public $timestamps = false;

    /**
     * attributes that are mass assignable     * 
     * @var array
     */
    protected $fillable = [
        'nome'
    ];

    /**
     * casts types
     * @var array<string>
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string'
    ];
}
