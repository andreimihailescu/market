<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Integer;

class Product extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'name',
		'description',
		'type',
		'stock',
		'price',
		'image_source'
	];

	public function products()
	{
		return $this->belongsToMany('App\Cart', 'carts_products', 'product_id', 'cart_id');
	}

	public static function getAll()
	{
		$products = Product::all();

		return Product::hydrate($products->toArray());
	}

	public static function get($id)
	{
		$product = Product::find($id);

		return $product;
	}

	public static function set(Product $product)
	{
		$product->save();
	}
}
