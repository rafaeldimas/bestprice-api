<?php

namespace BestPrice\Domains\Products\Providers;

use BestPrice\Domains\Products\Database\Factories\ProductFactory;
use BestPrice\Domains\Products\Database\Migrations\CreateProductsTable;
use BestPrice\Domains\Products\Database\Seeders\ProductSeeder;
use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait;

/**
 * Class DomainServiceProvider
 * @package BestPrice\Domains\Products\Providers
 */
class DomainServiceProvider extends ServiceProvider
{
    use MigratorTrait;

    public function register()
    {
        $this->registerMigrations();
        $this->registerFactories();
        $this->registerSeeders();
    }

    protected function registerMigrations()
    {
        $this->migrations([
            CreateProductsTable::class,
        ]);
    }

    protected function registerFactories()
    {
        (new ProductFactory)->define();
    }

    protected function registerSeeders()
    {
        $this->seeders([
            ProductSeeder::class,
        ]);
    }
}