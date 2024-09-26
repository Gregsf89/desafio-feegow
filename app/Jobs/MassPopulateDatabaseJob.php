<?php

namespace App\Jobs;

use App\Models\DoseVacina;
use App\Models\Funcionario;
use App\Models\LoteVacina;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Str;

class MassPopulateDatabaseJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly int $funcionarioQnt = 5000,
        private readonly int $loteVacinaQnt = 5000,
        private readonly int $doseVacinaQnt = 10000
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Funcionario::factory()->count($this->funcionarioQnt + 1)
            ->create();

        LoteVacina::factory()->count($this->loteVacinaQnt + 1)
            ->create();

        $d = 0;
        do {
            $rnd = mt_rand(1, 3);
            $cpf = Funcionario::inRandomOrder()->first()->cpf;

            for ($i = 1; $i <= $rnd; $i++)
                DoseVacina::updateOrCreate([
                    'funcionario_cpf' => $cpf,
                    'dose' => $i
                ], [
                    'lote_vacina_id' => LoteVacina::inRandomOrder()->first()->id,
                    'data_aplicacao' => now()
                ])->fresh();
            $d++;
        } while ($d < $this->doseVacinaQnt);
    }
}
