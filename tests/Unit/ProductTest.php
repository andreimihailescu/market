<?php

namespace Tests\Unit;

use App\Traits\Authentification;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp;

class ProductTest extends TestCase
{
	use Authentification;

	public function testExample()
	{
		$accessToken = $this->getAccessToken();

		$response = $this
			->withHeader('Authorization', 'Bearer ' . $accessToken)
			->json('GET', '/api/product');

		$response
			->assertStatus(200)
			->assertJsonStructure([
				[
					'id',
					'name',
					'description',
					'type',
					'stock',
					'price'
				]
			]);

		$this->assertTrue(true);
	}
}
