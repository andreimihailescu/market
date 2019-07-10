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
		return response()->json(SchedulerTask::getAll());
	}

	public function store(Request $request)
	{
		SchedulerTask::set($request->post());

		return response('OK');
	}

	public function show($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		SchedulerTask::set($request->post(), (int)$id);

		return response('OK');
	}

	public function destroy($id)
	{
		//
	}
}
