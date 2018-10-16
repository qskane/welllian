<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Parsedown;

class ArticleController extends Controller
{

    public function index()
    {
        $Parsedown = new Parsedown();
        $md = file_get_contents(base_path('examples/example.md'));
        $html = $Parsedown->text($md);

        return view('document.index', compact('html'));
    }


    public function document()
    {
        // FIXME
        return view('document.index');
    }

    public function documentShow($id)
    {
        // FIXME
        //        $article = Article::document()->published()->findOrFail($id);
        $article = 1;

        return view('document.show', compact('article'));
    }


}
