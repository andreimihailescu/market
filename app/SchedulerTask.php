<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchedulerTask extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'name',
		'description',
		'date'
	];

	public function action(){
		return $this->hasOne('App\SchedulerAction');
	}
}
