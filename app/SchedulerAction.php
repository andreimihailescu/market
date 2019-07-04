<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchedulerAction extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'type',
		'new_price'
	];
}
