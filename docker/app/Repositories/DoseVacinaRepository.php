<?php

namespace App\Repositories;

use App\Models\DoseVacina;

class DoseVacinaRepository extends BaseRepository implements DoseVacinaRepositoryInterface
{
    /**
     * getFuncionarioByCpf
     * @param array $data
     * @return null|DoseVacina
     */
    public function create(array $data): DoseVacina
    {
        return DoseVacina::create($data)->fresh();
    }
}