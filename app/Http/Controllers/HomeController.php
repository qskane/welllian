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
        return view('test');
    }

}
