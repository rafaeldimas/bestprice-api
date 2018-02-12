<?php

namespace BestPrice\Domains\Products\Database\Factories;

use BestPrice\Domains\Products\Price;
use BestPrice\Support\Database\ModelFactory;

/**
 * Class PriceFactory
 * @package BestPrice\Domains\Products\Database\Factories
 */
class PriceFactory extends ModelFactory
{
    /**
     * @var string
     */
    protected $model = Price::class;

    /**
     * @return mixed
     */
    protected function fields()
    {
        $promotional = $this->faker->boolean;
        return [
            'price' => $this->faker->randomDigitNotNull,
            'promotional' => $promotional,
            'promotion_date' => $promotional ? $this->faker->dateTimeBetween('now', '+30 years')     : null,
        ];
    }
}