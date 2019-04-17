<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	public function user(){
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function products()
	{
		return $this->belongsToMany('App\Product', 'carts_products', 'cart_id', 'product_id');
	}
}
