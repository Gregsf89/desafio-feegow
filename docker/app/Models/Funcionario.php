<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Funcionario extends BaseModel
{
    /**
     * Table name.
     * @var string
     */
    protected $table = 'funcionarios';

    /**
     * The primary key associated with the table.
     * @var string
     */
    protected $primaryKey = 'cpf';

    /**
     * Indicates if the model's ID is auto-incrementing.
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'cpf',
        'nome',
        'data_nascimento'
    ];

    /**
     * Casts types.
     * @var array<string>
     */
    protected $casts = [
        'cpf' => 'string',
        'nome' => 'string',
        'data_nascimento' => 'date'
    ];

    /**
     * Relationship with DoseVacina.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dosesVacina(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DoseVacina::class, 'cpf_funcionario', 'cpf');
    }

    /**
     * Relationship with Comorbidade.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comorbidades(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Comorbidade::class, ComorbidadeFuncionario::class, 'cpf_funcionario', 'id', 'cpf', 'id_comorbidade');
    }
}
