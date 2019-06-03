<?php

namespace App;

use App\Providers\ProductServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\Types\Integer;

class Product extends Model implements ProductServiceInterface
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
		$products = Cache::rememberForever('products', function (){
			return Product::all();
		});

		return $products;
	}

	public static function get($id)
	{
		$product = Product::find($id);

		return $product;
	}

	public static function set(Product $product)
	{
		$product->save();

		Cache::forget('products');

		return true;
	}
}
