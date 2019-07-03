<?php

namespace App\Http\Controllers\CMS;

use App\ProductSchedulerTask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductSchedulerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		dd($request->post());

		$productSchedulerTask = new ProductSchedulerTask();
		$productSchedulerTask->name = $request->post('title');

		dd($productSchedulerTask);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\ProductSchedulerTask $productSchedulerTask
	 * @return \Illuminate\Http\Response
	 */
	public function show(ProductSchedulerTask $productSchedulerTask)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\ProductSchedulerTask $productSchedulerTask
	 * @return \Illuminate\Http\Response
	 */
	public function edit(ProductSchedulerTask $productSchedulerTask)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\ProductSchedulerTask $productSchedulerTask
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, ProductSchedulerTask $productSchedulerTask)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\ProductSchedulerTask $productSchedulerTask
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(ProductSchedulerTask $productSchedulerTask)
	{
		//
	}
}
