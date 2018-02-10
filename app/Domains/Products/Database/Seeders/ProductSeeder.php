<?php

namespace BestPrice\Domains\Products\Database\Seeders;

use BestPrice\Domains\Products\Product;
use Illuminate\Database\Seeder;

/**
 * Class ProductSeeder
 * @package BestPrice\Domains\Products\Database\Seeders
 */
class ProductSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class)->times(30)->create();
    }
}