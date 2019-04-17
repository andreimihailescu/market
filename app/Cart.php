<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
	use SoftDeletes;

	public function user(){
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function products()
	{
		return $this->belongsToMany('App\Product', 'carts_products', 'cart_id', 'product_id');
	}
}
