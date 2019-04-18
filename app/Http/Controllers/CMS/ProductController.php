<?php

namespace App\Http\Controllers\CMS;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$products = Product::getAll();

		return view('cms/product/list', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('cms/product/form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|max:255',
			'stock' => 'required|numeric',
			'type' => [
				'required',
				Rule::in(['laptop', 'computer', 'phone']),
			],
			'price' => 'required|numeric',
		]);

		$product = new Product();
		$product->name = $request->get('name');
		$product->description = $request->get('description');
		$product->type = $request->get('type');
		$product->stock = $request->get('stock');
		$product->price = $request->get('price');

		Product::set($product);

		return redirect()->action('CMS\ProductController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product)
	{
		return view('cms/product/form', compact('product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product)
	{
		$request->validate([
			'name' => 'required|max:255',
			'stock' => 'required|numeric',
			'type' => [
				'required',
				Rule::in(['laptop', 'computer', 'phone']),
			],
			'price' => 'required|numeric',
		]);

		$product->name = $request->get('name');
		$product->description = $request->get('description');
		$product->type = $request->get('type');
		$product->stock = $request->get('stock');
		$product->price = $request->get('price');

		Product::set($product);

		return redirect()->action('CMS\ProductController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		dd($product);
	}
}
