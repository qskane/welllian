<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Models\User;

class TestController extends Controller
{

    public function index()
    {

        $selected = [];

        viewer()->storage('menu', cache('article_categories'));

//        dd(viewer()->storage());
        return view('test.index');
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
