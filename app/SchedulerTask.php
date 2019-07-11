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
			$task = SchedulerTask::find($id);
			$task->title = $data['title'];
			$task->description = $data['description'];
			$task->date = $data['date'];
			$task->save();

			$action = $task->action()->get()[0];
			$action->type = $data['action']['type'];
			$action->new_price = $data['action']['new_price'];
			$action->product_id = $data['action']['product_id'];
			$action->save();
			return;
		}

		$task = new SchedulerTask($data);
		$task->save();
		$task->action()->create($data['action']);
	}
}
