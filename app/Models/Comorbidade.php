<?php

namespace App\Models;

class Comorbidade extends BaseModel
{
    /**
     * table name
     * @var string
     */
    protected $table = 'comorbidades';

    /**
     * if the model uses timestamps
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'laravel_through_key'
    ];

    /**
     * attributes that are mass assignable
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
