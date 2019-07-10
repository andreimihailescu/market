<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchedulerTask extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'title',
		'description',
		'date'
	];

	public function action()
	{
		return $this->hasOne('App\SchedulerAction');
	}

	public static function getAll(): iterable
	{
		return SchedulerTask::with('action')->get();
	}

	public static function set(array $data, int $id = null): void
	{
		if ($id) {
			$task = SchedulerTask::find($id)->with('action')->get();
			$task->title = $data['title'];
			$task->description = $data['description'];
			$task->date = $data['date'];
			dd($task->action());
			return;
		}

		$task = new SchedulerTask($data);
		$task->save();
		$task->action()->create($data['action']);
	}
}
