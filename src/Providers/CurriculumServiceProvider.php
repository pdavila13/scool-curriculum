<?php

namespace Scool\Curriculum\Providers;

use Illuminate\Support\ServiceProvider;

class CurriculumServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (!defined('SCOOL_CURRICULUM_PATH')) {
            define('SCOOL_CURRICULUM_PATH', realpath(__DIR__.'/../../'));
        }
    }

    public function boot()
    {
        $this->loadMigrations();
        $this->publishFactories();
    }

    private function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    private function publishFactories()
    {
        $this->publishes(
            [
                __DIR__.'/../../database/factories/StudyFactory.php' =>
                database_path() . '/factories/StudyFactory.php'
            ],"scool_curriculum"
        );
    }
}