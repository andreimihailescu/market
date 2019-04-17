<?php

use App\Cart;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user = new User();
		$user->name = 'Andrei';
		$user->email = 'andrei@email.com';
		$user->role = 'normal';
		$user->password = '123123';
		$user->save();
		$user->cart()->save(new Cart());
	}
}
