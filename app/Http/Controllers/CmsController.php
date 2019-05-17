<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;

class CmsController extends Controller
{
    public function index(){
        $http = new GuzzleHttp\Client;

        // TODO Needs to be refactored
        $response = $http->post('http://localhost/oauth/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => '1',
                'client_secret' => 'oGapMd9zMJrHhyalGwuqoN2C8VZuFnCBIjK9L9He',
                'scope' => '',
            ],
        ]);

        $accessToken = json_decode((string) $response->getBody(), true)['access_token'];

        return view('cms', compact('accessToken'));
    }
}
