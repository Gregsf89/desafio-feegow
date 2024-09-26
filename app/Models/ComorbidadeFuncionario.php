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
     * if the model uses timestamps
     * @var bool
     */
    public $timestamps = false;

    /**
     * attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'funcionario_cpf',
        'comorbidade_id'
    ];

    /**
     * casts types
     * @var array<string>
     */
    protected $casts = [
        'funcionario_cpf' => 'string',
        'comorbidade_id' => 'integer'
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
     * Relationship with Comorbidade.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comorbidade(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Comorbidade::class, 'comorbidade_id', 'id');
    }
}
