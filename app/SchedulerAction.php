<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchedulerAction extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'type',
		'new_price',
		'product_id'
	];

	public function product(){
		return $this->belongsTo('App\Product');
	}
}
