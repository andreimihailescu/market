<?php

namespace App\Mocks;

use App\Product;
use App\Providers\ProductServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductMock implements ProductServiceInterface
{

	public static function get($id)
	{
		// TODO: Implement get() method.
	}

	public static function getAll()
	{
		$products = new Collection();

		$product = new Product();
		$product->name = 'Test name';
		$product->description = 'Test description';
		$product->type = 'Computer';
		$product->stock = 1;
		$product->price = 2;
		$product->image_source = '/img/test-image.svg';

		for ($i = 0; $i < 25; $i++) {
			$products->add($product);
		}

		return $products;
	}

	public static function set(Product $product)
	{
		// TODO: Implement set() method.
	}
}
