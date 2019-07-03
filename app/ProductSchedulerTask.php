<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSchedulerTask extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'name',
		'description',
		'date',
		'type',
		'new_price'
	];

	public static function set(ProductSchedulerTask $productSchedulerTask)
	{
		return true;
	}
}
