<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Lang;

class ProductExtendController extends Controller
{
    public function index()
    {
        $client = new client();
        $url = "http://35.223.189.84/public/api/products";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
        return view('api.index')->with("viewData", $responseBody);
    }
    public function show($id)
    {
        $client = new client();
        $url = "http://35.223.189.84/public/api/products/".$id;
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
        return view('api.show')->with("viewData", $responseBody);
    }
}
