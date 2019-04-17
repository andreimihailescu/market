<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
	public function index()
	{
		$user = User::where('name', 'Andrei')->first();
		$user->name = 'Andrei';
		$user->email = 'andrei@email.com';
		$user->role = 'normal';
		$user->password = '123123';
		$user->cart()->save(new Cart());
		$user->save();

		return response('DONE');
	}
}
