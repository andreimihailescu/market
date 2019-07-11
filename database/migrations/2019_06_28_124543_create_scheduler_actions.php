<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulerActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduler_actions', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('scheduler_task_id')->unsigned();
			$table->enum('type', ['price_change']);
			$table->bigInteger('product_id')->unsigned();
			$table->integer('new_price');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('scheduler_task_id')->references('id')->on('scheduler_tasks');
			$table->foreign('product_id')->references('id')->on('products');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduler_actions');
    }
}
