<?php

namespace App\Models;

class ComorbidadeFuncionario extends BaseModel
{
    /**
     * table name
     * @var string
     */
    protected $table = 'comorbidade_funcionarios';

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
        'id_comorbidade'
    ];

    /**
     * casts types
     * @var array<string>
     */
    protected $casts = [
        'cpf_funcionario' => 'string',
        'id_comorbidade' => 'integer'
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
     * Relationship with Comorbidade.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comorbidade(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Comorbidade::class, 'id_comorbidade', 'id');
    }
}
