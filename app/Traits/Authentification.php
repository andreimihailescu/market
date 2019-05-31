<?php

namespace App\Traits;

use GuzzleHttp;

trait Authentification
{
	public function getAccessToken()
	{
		$http = new GuzzleHttp\Client;

		// TODO Needs to be refactored
		$response = $http->post(env('APP_URL') . '/oauth/token', [
			'form_params' => [
				'grant_type' => 'client_credentials',
				'client_id' => '1',
				'client_secret' => 'oGapMd9zMJrHhyalGwuqoN2C8VZuFnCBIjK9L9He',
				'scope' => '',
			],
		]);

		$responseBody = json_decode($response->getBody(), true);

		return $responseBody['access_token'];
	}
}
