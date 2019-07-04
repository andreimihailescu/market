<?php

namespace App\Http\Controllers\CMS;

use App\Product;
use App\SchedulerTask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductSchedulerController extends Controller
{
	public function index()
	{
		$tasks = SchedulerTask::with('action')->get();

		return response()->json($tasks);
	}

	public function store(Request $request)
	{
		$task = new SchedulerTask($request->post());
		$task->save();
		$task->action()->create($request->post()['action']);

		return response('OK');
	}

	public function show($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
