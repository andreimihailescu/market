<?php

namespace App\Jobs;

use App\Product;
use App\SchedulerTask;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Date;

class SchedulerTaskProcessJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
//        $tasks = SchedulerTask::with('action', 'action.product')->get();
		$tasks = SchedulerTask::all();

		foreach ($tasks as $task) {
			$taskDate = new DateTime($task->date);

			if ($taskDate < new DateTime() || !isset($task->action)) {
				continue;
			}

			switch ($task->action->type) {
				case 'price_change':
					$this->priceChange($task->action->product_id, $task->action->new_price);
					break;
				default:
			}
		}
	}

	private function priceChange(int $targetProductId, int $newPrice): void
	{
		$targetProduct = Product::get($targetProductId);

		echo "Changing price of the product $targetProduct->name to price $newPrice";
	}
}
