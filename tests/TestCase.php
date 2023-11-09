<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        // Verifique se a variável de ambiente DB_SEED está definida como "true"
        if (env('DB_SEED', false)) {
            // Execute a semente dos cargos
            $this->artisan('db:seed', ['--class' => 'CargoSeeder']); // Substitua 'CargoSeeder' pelo nome da sua seeder
        }
    }

}
