<?php

namespace App\Models;

class DoseVacina extends BaseModel
{
    /**
     * table name
     * @var string
     */
    protected $table = 'dose_vacinas';

    /**
     * primaryKey.
     * @var null
     */
    protected $primaryKey = null;

    /**
     * Indicates if the model's ID is auto-incrementing.
     * @var bool
     */
    public $incrementing = false;

    /**
     * attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'funcionario_cpf',
        'lote_vacina_id',
        'dose',
        'data_aplicacao'
    ];

    /**
     * casts types
     * @var array<string>
     */
    protected $casts = [
        'funcionario_cpf' => 'string',
        'lote_vacina_id' => 'string',
        'dose' => 'string',
        'data_aplicacao' => 'date'
    ];

    /**
     * Relationship with Funcionario.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function funcionario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_cpf', 'cpf');
    }

    /**
     * Relationship with LoteVacina.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loteVacina(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LoteVacina::class, 'lote_vacina_id', 'id');
    }
}
