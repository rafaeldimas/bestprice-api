<?php

namespace BestPrice\Domains\Products\Database\Seeders;

use BestPrice\Domains\Products\Category;
use Illuminate\Database\Seeder;

/**
 * Class CategorySeeder
 * @package BestPrice\Domains\Products\Database\Seeders
 */
class CategorySeeder extends Seeder
{
    public function run()
    {
        factory(Category::class)->times(30)->create();
    }
}