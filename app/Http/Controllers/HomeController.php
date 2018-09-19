<?php

namespace App\Http\Controllers;


use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::limit(12)->get();

        return view('home.index', compact('products'));
    }

    public function test()
    {

        $a = null;

        dd($a ?? 'none');

        return view('test');
        //        $url = 'https://oauth.jd.com/oauth/authorize?response_type=code&client_id=CLIENT_ID&redirect_uri=REDIRECT_URI&state=STATE_CODE';
        //        $url = str_replace(['CLIENT_ID', 'REDIRECT_URI', 'STATE_CODE'], ['2EBCF76F88CD64790F0D22478BB60399', 'http://malllian-dev.com', '1234'], $url);
        //        echo $url;

    }

}
