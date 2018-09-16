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
}
