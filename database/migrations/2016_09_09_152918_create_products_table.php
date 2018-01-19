<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('catigory_id')->unsigned();
            $table->integer('price');
            $table->integer('limited');
            $table->integer('brand_id')->unsigned();
            $table->string('name');
            $table->integer('location_id')->unsigned();
            $table->string('image');
            $table->string('thumb');
            $table->string('short_desc');
            $table->text('long_desc');
            $table->string('status');
            $table->boolean('live');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('products');
    }
}
