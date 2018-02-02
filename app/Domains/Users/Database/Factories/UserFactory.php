<?php

namespace BestPrice\Domains\Users\Database\Factories;

use BestPrice\Domains\Users\User;
use BestPrice\Support\Database\ModelFactory;

class UserFactory extends ModelFactory
{
    protected $model = User::class;

    /**
     * @return mixed
     */
    protected function fields()
    {
        static $password;

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password ?: $password = bcrypt('secret'),
            'remember_token' => str_random(10),
        ];
    }
}