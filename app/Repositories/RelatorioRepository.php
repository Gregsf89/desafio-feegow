<?php

namespace App\Repositories;

use App\Contracts\RelatorioRepositoryInterface;
use App\Models\Funcionario;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RelatorioRepository extends BaseRepository implements RelatorioRepositoryInterface
{
    /**
     * Return a paginated list of funcionarios
     * @param int $page
     * @param int $limit
     * @param bool $vacinated
     * @return LengthAwarePaginator
     */
    public function getRelatorioPaginated(int $page = 1, int $limit = 10, bool $vacinated = false): LengthAwarePaginator
    {
        $query = Funcionario::select(
            'cpf',
            'nome',
            'data_nascimento',
            \DB::raw('COUNT(comorbidade_funcionarios.funcionario_cpf) > 0 as comorbidade'),
            \DB::raw('COUNT(dose_vacinas.funcionario_cpf) > 0 as vacinado')
        )
            ->leftJoin('comorbidade_funcionarios', 'funcionarios.cpf', '=', 'comorbidade_funcionarios.funcionario_cpf')
            ->leftJoin('dose_vacinas', 'funcionarios.cpf', '=', 'dose_vacinas.funcionario_cpf')
            ->groupBy('funcionarios.cpf')
            ->having('vacinado', '=', (int) $vacinated);

        return $query->paginate($limit, ['*'], 'page', $page);
    }
}
