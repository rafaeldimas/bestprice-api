<?php

namespace BestPrice\Domains\Products\Database\Migrations;

use BestPrice\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreatePricesTable
 * @package BestPrice\Domains\Products\Database\Migrations
 */
class CreatePricesTable extends Migration
{
    public function up()
    {
        $this->schema->create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->decimal('price');
            $table->boolean('promotional');
            $table->dateTime('promotion_date')->nullable();
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        $this->schema->dropIfExists('prices');
    }
}
