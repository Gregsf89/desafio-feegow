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
     * attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'cpf_funcionario',
        'id_lote_vacina',
        'data_aplicacao'
    ];

    /**
     * casts types
     * @var array<string>
     */
    protected $casts = [
        'cpf_funcionario' => 'string',
        'id_lote_vacina' => 'string',
        'data_aplicacao' => 'date'
    ];

    /**
     * Relationship with Funcionario.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function funcionario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'cpf_funcionario', 'cpf');
    }

    /**
     * Relationship with LoteVacina.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loteVacina(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LoteVacina::class, 'id_lote_vacina', 'id');
    }
}
