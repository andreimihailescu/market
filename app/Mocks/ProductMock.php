<?php

namespace App\Mocks;

use App\Product;
use App\Providers\ProductServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductMock implements ProductServiceInterface
{
	static $collection;

	public function __construct()
	{
		self::$collection = new Collection();

		$product = new Product();
		$product->name = 'Test name';
		$product->description = 'Test description';
		$product->type = 'Computer';
		$product->stock = 1;
		$product->price = 2;
		$product->image_source = '/img/test-image.svg';

		for ($i = 0; $i < 25; $i++) {
			self::$collection->add($product);
		}
	}

	public static function get($id)
	{
		return self::$collection[0];
	}

	public static function getAll()
	{
		return self::$collection;
	}

	public static function set(Product $product)
	{
		return true;
	}
}
