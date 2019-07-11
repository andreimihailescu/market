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
			$table->string('title');
			$table->text('description')->nullable();
			$table->boolean('processed')->default(false);
			$table->timestamp('date');
			$table->timestamps();
			$table->softDeletes();
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
