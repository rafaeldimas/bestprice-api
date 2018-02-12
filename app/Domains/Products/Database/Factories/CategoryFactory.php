<?php

namespace BestPrice\Domains\Products\Database\Factories;

use BestPrice\Domains\Products\Category;
use BestPrice\Support\Database\ModelFactory;

/**
 * Class CategoryFactory
 * @package BestPrice\Domains\Products\Database\Factories
 */
class CategoryFactory extends ModelFactory
{
    /**
     * @var string
     */
    protected $model = Category::class;

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