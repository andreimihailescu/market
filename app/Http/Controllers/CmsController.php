<?php

namespace App\Http\Controllers;

use App\Traits\Authentification;
use Illuminate\Http\Request;

class CmsController extends Controller
{
	use Authentification;

	public function index()
	{
		$accessToken = $this->getAccessToken();

		return view('cms', compact('accessToken'));
	}
}
