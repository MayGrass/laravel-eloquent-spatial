<?php

namespace MatanYadaev\EloquentSpatial\Tests;

use MatanYadaev\EloquentSpatial\EloquentSpatialServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    protected function getPackageProviders($app): array
    {
        return [
            EloquentSpatialServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        $app->config->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app->config->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'laravel_eloquent_spatial_test',
            'username' => 'root',
        ]);
    }

    protected function useMysql($app)
    {
        $app->config->set('database.default', 'mysql');
    }

    protected function useSqlite($app)
    {
        $app->config->set('database.default', 'sqlite');
    }
}
