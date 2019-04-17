<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts_products', function (Blueprint $table) {
        	$table->bigInteger('cart_id')->unsigned();
        	$table->bigInteger('product_id')->unsigned();

        	$table->foreign('cart_id')->references('id')->on('carts');
        	$table->foreign('product_id')->references('id')->on('products');

        	$table->primary(['cart_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts_products');
    }
}
