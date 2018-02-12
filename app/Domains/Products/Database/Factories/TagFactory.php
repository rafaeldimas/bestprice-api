<?php

namespace BestPrice\Domains\Products\Database\Factories;

use BestPrice\Domains\Products\Tag;
use BestPrice\Support\Database\ModelFactory;

/**
 * Class TagFactory
 * @package BestPrice\Domains\Products\Database\Factories
 */
class TagFactory extends ModelFactory
{
    /**
     * @var string
     */
    protected $model = Tag::class;

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