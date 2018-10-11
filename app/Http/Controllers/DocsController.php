<?php

namespace App\Http\Controllers;


use Parsedown;

class DocsController extends Controller
{

    public function index()
    {
        $Parsedown = new Parsedown();
        $md = file_get_contents(base_path('examples/example.md'));
        $html = $Parsedown->text($md);

        return view('docs.index', compact('html'));
    }

}
