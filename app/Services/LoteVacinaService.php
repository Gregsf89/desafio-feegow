<?php

namespace App\Services;

use App\Contracts\LoteVacinaRepositoryInterface;
use App\Contracts\LoteVacinaServiceInterface;
use App\Models\LoteVacina;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class LoteVacinaService extends BaseService implements LoteVacinaServiceInterface
{
    public function __construct(
        private readonly LoteVacinaRepositoryInterface $repositoryInterface
    ) {
    }

    /**
     * Creates a new LoteVacina model and persists it
     * @param array $data
     * @return LoteVacina
     */
    public function create(array $data): LoteVacina
    {
        $data['id'] = strtoupper(Str::ulid());
        return $this->repositoryInterface->create($data);
    }

    public function createLoteFromFuncionario(array $dosesVacinaInfo): array
    {
        $doseVacinaInfo = [];
        foreach ($dosesVacinaInfo as $lote) {
            $loteVacina = $this->create($lote['lote_vacina_info']);

            $doseVacinaInfo[$loteVacina->id] = [
                'data_aplicacao' => Carbon::parse($lote['data_aplicacao']),
                'dose' => $lote['dose']
            ];
        }

        return $doseVacinaInfo;
    }

    /**
     * Return all LoteVacina models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return $this->repositoryInterface->getAll();
    }

    /**
     * Return a LoteVacina model by its id
     * @param string $id
     * @return LoteVacina|null
     */
    public function getLoteVacinaById(string $id): ?LoteVacina
    {
        return $this->repositoryInterface->getLoteVacinaById($id);
    }
}
