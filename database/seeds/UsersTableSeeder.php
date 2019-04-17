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
		$user->password = '$2y$10$4y/4EKVAXkkO7GMYqtJvq.H0IQKqPFToyngK1MT77UmsJsIGyCsz6'; // test1234
		$user->save();
		$user->cart()->save(new Cart());
	}
}
