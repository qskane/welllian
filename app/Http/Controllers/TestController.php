<?php

namespace App\Http\Controllers;

class TestController extends Controller
{

    public function index()
    {


    }

    public function view()
    {
        return view('test.view');
    }

    public function league()
    {
        return view('test.league');
    }

}
