<?php

namespace BestPrice\Domains\Products\Providers;

use BestPrice\Domains\Products\Database\Factories\CategoryFactory;
use BestPrice\Domains\Products\Database\Factories\PhotoFactory;
use BestPrice\Domains\Products\Database\Factories\PriceFactory;
use BestPrice\Domains\Products\Database\Factories\ProductFactory;
use BestPrice\Domains\Products\Database\Factories\TagFactory;
use BestPrice\Domains\Products\Database\Migrations\CreateCategoriesTable;
use BestPrice\Domains\Products\Database\Migrations\CreateCategoryProductTable;
use BestPrice\Domains\Products\Database\Migrations\CreatePhotosTable;
use BestPrice\Domains\Products\Database\Migrations\CreatePricesTable;
use BestPrice\Domains\Products\Database\Migrations\CreateProductsTable;
use BestPrice\Domains\Products\Database\Migrations\CreateProductTagTable;
use BestPrice\Domains\Products\Database\Migrations\CreateTagsTable;
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
            CreateCategoriesTable::class,
            CreateCategoryProductTable::class,
            CreateTagsTable::class,
            CreateProductTagTable::class,
            CreatePricesTable::class,
            CreatePhotosTable::class,
        ]);
    }

    protected function registerFactories()
    {
        (new ProductFactory)->define();
        (new CategoryFactory)->define();
        (new PhotoFactory)->define();
        (new PriceFactory)->define();
        (new TagFactory)->define();
    }

    protected function registerSeeders()
    {
        $this->seeders([
            ProductSeeder::class,
        ]);
    }
}