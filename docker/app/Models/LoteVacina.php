<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;

class LoteVacina extends BaseModel
{
    use HasUlids;

    /**
     * Table name.
     * @var string
     */
    protected $table = 'lote_vacinas';

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
        'tipo_vacina_id',
        'data_validade',
        'lote',
        'dose_unica'
    ];

    /**
     * Casts types.
     * @var array<string>
     */
    protected $casts = [
        'id' => 'string',
        'tipo_vacina_id' => 'integer',
        'data_validade' => 'date',
        'lote' => 'string',
        'dose_unica' => 'boolean'
    ];

    /**
     * Relationship with TipoVacina.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoVacina(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TipoVacina::class, 'tipo_vacina_id', 'id');
    }

    /**
     * Relationship with DoseVacina.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dosesVacina(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DoseVacina::class, 'lote_vacina_id', 'id');
    }

    /**
     * Relationship with Funcionario.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function funcionarios(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Funcionario::class,
            DoseVacina::class,
            'lote_vacina_id',
            'funcionario_cpf',
            'id',
            'cpf'
        )
            ->withPivotValue(['dose', 'data_aplicacao'])
            ->withTimestamps();
    }
}
