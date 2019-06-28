<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulerTasks extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scheduler_tasks', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->text('description');
			$table->bigInteger('scheduler_action_id')->unsigned();
			$table->timestamp('date');
			$table->timestamps();

			$table->foreign('scheduler_action_id')->references('id')->on('scheduler_tasks');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('scheduler_tasks');
	}
}
