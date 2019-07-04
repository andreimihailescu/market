<?php

namespace App\Http\Controllers\CMS;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
	public function index()
	{
		$products = Product::getAll();

		return response()->json($products);
	}

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
		$product->image_source = '/img/test-image.svg';

		Product::set($product);

		return redirect()->action('CMS\ProductController@index');
	}

	public function show(Product $product)
	{
		return response()->json($product);
	}

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

	public function destroy(Product $product)
	{
        $product->delete();

		return response('OK');
	}
}
