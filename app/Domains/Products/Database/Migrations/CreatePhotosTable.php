<?php

namespace BestPrice\Domains\Products\Database\Migrations;

use BestPrice\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreatePhotosTable
 * @package BestPrice\Domains\Products\Database\Migrations
 */
class CreatePhotosTable extends Migration
{
    public function up()
    {
        $this->schema->create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('url');
            $table->timestamps();

            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        $this->schema->dropIfExists('photos');
    }
}
