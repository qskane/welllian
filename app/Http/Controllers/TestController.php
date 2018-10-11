<?php

namespace App\Http\Controllers;

use Parsedown;

class TestController extends Controller
{

    public function index()
    {
    }

    public function view()
    {
        $Parsedown = new Parsedown();

        $md = file_get_contents(base_path('docs/FAQ.md'));
        $html = $Parsedown->text($md); # prints: <p>Hello <em>Parsedown</em>!</p>
        // you can also parse inline markdown only
        //        echo $Parsedown->line($md); # prints: Hello <em>Parsedown</em>!
        //        echo $Parsedown->parse($md);

        return view('test.markdown', compact('html'));
    }

}
