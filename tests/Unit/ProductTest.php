<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    public function testExample()
    {
		$response = $this->json('GET', '/api/product');

		dd($response);

		$response
			->assertStatus(201)
			->assertExactJson([
				'created' => true,
			]);

        $this->assertTrue(true);
    }
}
