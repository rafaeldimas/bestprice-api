<?php

namespace BestPrice\Domains\Users\Providers;

use BestPrice\Domains\Users\Database\Factories\UserFactory;
use BestPrice\Domains\Users\Database\Migrations\CreatePasswordResetsTable;
use BestPrice\Domains\Users\Database\Migrations\CreateUsersTable;
use BestPrice\Domains\Users\Database\Seeders\UserSeeder;
use Migrator\MigratorTrait as HasMigrations;
use Illuminate\Support\ServiceProvider;

/**
 * Class DomainServiceProvider
 */
class DomainServiceProvider extends ServiceProvider
{
    use HasMigrations;

    public function register()
    {
        $this->registerMigrations();
        $this->registerFactories();
        $this->registerSeeders();
    }

    protected function registerMigrations()
    {
        $this->migrations([
            CreateUsersTable::class,
            CreatePasswordResetsTable::class,
        ]);
    }

    protected function registerFactories()
    {
        (new UserFactory())->define();
    }

    protected function registerSeeders()
    {
        $this->seeders([
            UserSeeder::class,
        ]);
    }
}
