<?php

namespace App\Repositories;

use App\Models\LoteVacina;

class LoteVacinaRepository extends BaseRepository implements LoteVacinaRepositoryInterface
{
    /**
     * getFuncionarioByCpf
     * @param array $data
     * @return null|LoteVacina
     */
    public function create(array $data): LoteVacina
    {
        return LoteVacina::create($data)->fresh();
    }
}