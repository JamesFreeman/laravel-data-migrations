<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */

namespace JamesFreeman\DataMigrations\Console\Commands;

use Illuminate\Database\Console\Migrations\MigrateCommand;
use JamesFreeman\DataMigrations\Console\Traits\DataMigrationCommandTrait;

/**
 * MigrateDataCommand class.
 *
 * @author José Lorente <jose.lorente.martin@gmail.com>
 */
class MigrateDataCommand extends MigrateCommand
{
    use DataMigrationCommandTrait;

    /**
     * The name and signature of the console command.
     */
    protected $signature = 'migrate-data {--database= : The database connection to use.}
                {--force : Force the operation to run when in production}
                {--path=* : The path(s) to the migrations files to be executed}
                {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
                {--pretend : Dump the SQL queries that would be run}
                {--seed : Indicates if the seed task should be re-run}
                {--step : Force the migrations to be run so they can be rolled back individually}';

    /**
     * The console command description.
     */
    protected $description = 'Run the data migrations';

    /**
     * Prepare the migration database for running.
     */
    protected function prepareDatabase(): void
    {
        $this->migrator->setConnection($this->option('database'));

        if (!$this->migrator->repositoryExists()) {
            $this->call(
                    'migrate-data:install', ['--database' => $this->option('database')]
            );
        }
    }

}
