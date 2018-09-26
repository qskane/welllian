<?php

namespace App\Http\Controllers;


use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::limit(12)->get();

        return view('home.index', compact('products'));
    }

    public function test()
    {
        $base = 'http://malllian-dev.com';

        $client = new Client([
            'base_uri' => $base,
            'timeout' => 2.0,
        ]);

        try {
            $response = $client->get('/');

            dd($response->getStatusCode());
        } catch (\Exception $e) {
            Log::info($e->getMessage(), ['url' => $base]);
        }

        $body = $response->getBody();

        dd($body->getContents());

    }

}
