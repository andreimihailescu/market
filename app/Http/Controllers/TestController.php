<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
	public function index()
	{
		$user = User::where('name', 'Andrei')
			->with('cart')
			->first();
//		$user->cart()->save(new Cart());

		return response()->json($user);
	}
}
