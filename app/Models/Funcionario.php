<?php

namespace App\Models;

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
        return $this->hasMany(DoseVacina::class, 'funcionario_cpf', 'cpf');
    }

    /**
     * Relationship with Comorbidade.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function comorbidades(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Comorbidade::class,
            ComorbidadeFuncionario::class,
            'funcionario_cpf',
            'comorbidade_id',
            'cpf',
            'id'
        );
    }

    /**
     * Relationship with LoteVacina.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function loteVacinas(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            LoteVacina::class,
            DoseVacina::class,
            'funcionario_cpf',
            'lote_vacina_id',
            'cpf',
            'id'
        )
            ->withPivot(['dose', 'data_aplicacao'])
            ->withTimestamps();
    }
}
