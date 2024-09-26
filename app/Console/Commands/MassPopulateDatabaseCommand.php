<?php

namespace App\Console\Commands;

use App\Jobs\MassPopulateDatabaseJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MassPopulateDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:mass-populate {--F|funcQnt=5000} {--L|loteQnt=5000} {--D|doseQnt=1000}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the DB with a lot of data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        MassPopulateDatabaseJob::dispatch(
            (int) $this->option('funcQnt'),
            (int) $this->option('loteQnt'),
            (int) $this->option('doseQnt')
        );

        Artisan::call('queue:work --tries=1');

        return;
    }
}
