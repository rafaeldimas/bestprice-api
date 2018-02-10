<?php

namespace BestPrice\Domains\Products\Database\Factories;

use BestPrice\Domains\Products\Product;
use BestPrice\Support\Database\ModelFactory;

/**
 * Class ProductFactory
 * @package BestPrice\Domains\Products\Database\Factories
 */
class ProductFactory extends ModelFactory
{
    /**
     * @var string
     */
    protected $model = Product::class;

    /**
     * @return mixed
     */
    protected function fields()
    {
        return [
            'name' => $this->faker->unique()->name,
        ];
    }
}