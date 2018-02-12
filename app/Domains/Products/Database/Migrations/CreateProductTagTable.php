<?php

namespace BestPrice\Domains\Products\Database\Migrations;

use BestPrice\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateProductTagTable
 * @package BestPrice\Domains\Products\Database\Migrations
 */
class CreateProductTagTable extends Migration
{
    public function up()
    {
        $this->schema->create('product_tag', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('tag_id');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        $this->schema->dropIfExists('product_tag');
    }
}
