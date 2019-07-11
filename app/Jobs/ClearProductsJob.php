<?php

namespace App\Jobs;

use App\Product;
use App\Providers\ProductServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ClearProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    	$deletedProducts = Product::where('stock', '<', 0)->delete();

    	if($deletedProducts){
    		$word = $deletedProducts === 1 ? 'product' : 'products';
			echo "$deletedProducts $word has been deleted.\n";
		}
    }
}
