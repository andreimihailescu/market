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
			$table->integer('new_price');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('scheduler_task_id')->references('id')->on('scheduler_tasks');
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
