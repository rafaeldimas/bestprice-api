<?php

namespace BestPrice\Domains\Products\Database\Factories;

use BestPrice\Domains\Products\Photo;
use BestPrice\Support\Database\ModelFactory;

/**
 * Class PhotoFactory
 * @package BestPrice\Domains\Products\Database\Factories
 */
class PhotoFactory extends ModelFactory
{
    /**
     * @var string
     */
    protected $model = Photo::class;

    /**
     * @return mixed
     */
    protected function fields()
    {
        return [
            'url' => $this->faker->imageUrl(),
        ];
    }
}