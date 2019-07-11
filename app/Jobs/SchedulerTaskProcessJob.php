<?php

namespace App\Jobs;

use App\SchedulerTask;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

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

        foreach($tasks as $task){
        	dd(new DateTime($task->date));
		}

        dd(json_decode(json_encode($tasks), true));
    }
}
