<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the database if it does not exist';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $driver = env('DB_CONNECTION', 'mysql');
        $databaseData = config('database.connections');
        if (empty($databaseData[$driver]))
            return;

        $databaseData = $databaseData[$driver];
        $database = $databaseData['database'];

        if (!$database)
            return;

        try {
            $pdo = $this->getPDOConnection($databaseData['host'], $databaseData['port'], $databaseData['username'], $databaseData['password']);

            $pdo->exec(sprintf(
                'CREATE DATABASE IF NOT EXISTS %s CHARACTER SET %s COLLATE %s;',
                $database,
                $databaseData['charset'],
                $databaseData['collation']
            ));
        } catch (\PDOException $exception) {
            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }

    /**
     * @param  string $host
     * @param  integer $port
     * @param  string $username
     * @param  string $password
     * @return \PDO
     */
    private function getPDOConnection($host, $port, $username, $password): \PDO
    {
        return new \PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
