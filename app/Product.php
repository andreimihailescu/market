<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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

}
