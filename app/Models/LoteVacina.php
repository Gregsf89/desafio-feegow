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
        'id_tipo_vacina',
        'validade',
        'lote',
        'dose_unica'
    ];

    /**
     * Casts types.
     * @var array<string>
     */
    protected $casts = [
        'id' => 'string',
        'id_tipo_vacina' => 'integer',
        'validade' => 'date',
        'lote' => 'string',
        'dose_unica' => 'boolean'
    ];

    /**
     * Relationship with TipoVacina.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoVacina(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TipoVacina::class, 'id_tipo_vacina', 'id');
    }
}
