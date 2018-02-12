<?php

namespace BestPrice\Domains\Products\Database\Migrations;

use BestPrice\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateProductsTable
 * @package BestPrice\Domains\Products\Database\Migrations
 */
class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->schema->create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_default')->nullable();
            $table->integer('photo_default')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->schema->dropIfExists('products');
    }
}
