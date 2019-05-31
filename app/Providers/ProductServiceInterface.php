<?php

namespace App\Providers;

use App\Product;

interface ProductServiceInterface
{
	public static function get($id);

	public static function getAll();

	public static function set(Product $product);
}
