<?php

namespace BestPrice\Domains\Products\Database\Seeders;

use BestPrice\Domains\Products\Category;
use BestPrice\Domains\Products\Photo;
use BestPrice\Domains\Products\Price;
use BestPrice\Domains\Products\Product;
use BestPrice\Domains\Products\Tag;
use Illuminate\Database\Seeder;

/**
 * Class ProductSeeder
 * @package BestPrice\Domains\Products\Database\Seeders
 */
class ProductSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class)
            ->times(30)
            ->create()
            ->each(function ($product) {
                $product->prices()->saveMany(factory(Price::class)->times(5)->make());
                $product->photos()->saveMany(factory(Photo::class)->times(5)->make());

                $product->categories()->attach(factory(Category::class)->times(5)->create());
                $product->tags()->attach(factory(Tag::class)->times(5)->create());
            });
    }
}