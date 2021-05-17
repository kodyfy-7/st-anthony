<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyReadingController extends Controller
{
    public function guzzleGet()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://testmyapi.com');
        $response = $request->getBody();

        dd($response);
    }
}
