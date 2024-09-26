<?php

namespace App\Models;

class Comorbidade extends \Illuminate\Database\Eloquent\Model
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

    /**
     * Relationship with Funcionario.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function funcionarios(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Funcionario::class,
            ComorbidadeFuncionario::class,
            'comorbidade_id',
            'funcionario_cpf',
            'id',
            'cpf'
        );
    }
}
