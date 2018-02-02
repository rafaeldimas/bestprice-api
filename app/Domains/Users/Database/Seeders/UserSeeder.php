<?php

namespace BestPrice\Domains\Users\Database\Seeders;

use BestPrice\Domains\Users\User;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
 * @package BestPrice\Domains\Users\Database\Seeders
 */
class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->times(30)->create();
    }
}