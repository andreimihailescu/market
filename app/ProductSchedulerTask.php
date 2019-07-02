<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSchedulerTask extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'new',
		'description',
		'date',
		'type',
		'new_price'
	];
}
