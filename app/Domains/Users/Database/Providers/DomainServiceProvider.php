<?php

namespace BestPrice\Domains\Users\Database\Providers;

use BestPrice\Domains\Users\Database\Factories\UserFactory;
use BestPrice\Domains\Users\Database\Migrations\CreatePasswordResetsTable;
use BestPrice\Domains\Users\Database\Migrations\CreateUsersTable;
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
}
