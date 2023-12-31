<?php

namespace Codedor\FilamentAdminBar\Tests;

use Codedor\FilamentAdminBar\Providers\FilamentAdminBarServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Codedor\\FilamentAdminBar\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentAdminBarServiceProvider::class,
            LivewireServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-admin-bar_table.php.stub';
        $migration->up();
        */
    }
}
