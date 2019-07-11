<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Jobs\SchedulerTaskProcessJob;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
	public function index()
	{
		SchedulerTaskProcessJob::dispatch();
	}
}
