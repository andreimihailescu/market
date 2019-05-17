<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
        	'id' => 1,
			'name' => 'cms_application',
			'secret' => 'oGapMd9zMJrHhyalGwuqoN2C8VZuFnCBIjK9L9He',
			'redirect' => '',
			'personal_access_client' => 0,
			'password_client' => 0,
			'revoked' => 0,
			'created_at' => new DateTime(),
			'updated_at' => new DateTime(),
		]);
    }
}
