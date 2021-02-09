<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */

namespace Coderan\DataMigrations\Console\Traits;

/**
 * DataMigrationCommandTrait trait.
 *
 * @author José Lorente <jose.lorente.martin@gmail.com>
 */
trait DataMigrationCommandTrait
{
    /**
     * Get the path to the migration directory.
     */
    protected function getMigrationPath(): string
    {
        if (is_string($targetPath = $this->input->getOption('path'))) {
            return $this->laravel->basePath() . '/' . $targetPath;
        } else {
            return $this->laravel->databasePath() . DIRECTORY_SEPARATOR . 'migrations_data';
        }
    }

}
