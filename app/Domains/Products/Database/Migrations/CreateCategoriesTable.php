<?php

namespace BestPrice\Domains\Products\Database\Migrations;

use BestPrice\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateCategoriesTable
 * @package BestPrice\Domains\Products\Database\Migrations
 */
class CreateCategoriesTable extends Migration
{
    public function up()
    {
        $this->schema->create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->schema->dropIfExists('categories');
    }
}
