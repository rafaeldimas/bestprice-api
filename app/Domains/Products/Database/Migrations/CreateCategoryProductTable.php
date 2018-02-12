<?php

namespace BestPrice\Domains\Products\Database\Migrations;

use BestPrice\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateCategoryProductTable
 * @package BestPrice\Domains\Products\Database\Migrations
 */
class CreateCategoryProductTable extends Migration
{
    public function up()
    {
        $this->schema->create('category_product', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('product_id');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        $this->schema->dropIfExists('category_product');
    }
}
