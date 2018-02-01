<?php

namespace BestPrice\Domains\Users\Database\Migrations;

use BestPrice\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
* Class CreateUsersTable
*/
class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->schema->dropIfExists('users');
    }
}
