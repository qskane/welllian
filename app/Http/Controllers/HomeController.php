<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::limit(12)->get();

        return view('home.index', compact('products'));
    }

    public function test()
    {
        Session::put('status', true);
    }

}
