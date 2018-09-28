<?php

namespace App\Http\Controllers;


use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Blade;
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

        $str = '<p>{{$name}}</p>';

        //        $r = (new BladeCompiler())->compileWiths($str, ['name' => 'fake name']);

        $r = $this->bladeCompile($str, ['name' => 'fake name']);

        dd($r);

        return view('test');
    }




}
