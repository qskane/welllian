<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::latest()->paginate();

        return view('article.index', compact('articles'));
    }

    public function articleCategoryShow($id)
    {
        $category = ArticleCategory::findOrFail($id);

        $ancestors = $category->ancestorsAndSelf()->get();

        $categories = $category->descendantsAndSelf()
            ->with(['articles' => function ($query) {
                $query->select(['id', 'title', 'article_category_id'])->published();
            }])->get();

        return view('article.category_show', compact('categories', 'ancestors'));
    }

    public function show($key, $lang = 'zh_cn')
    {
        $article = Article::published()->key($key)->language($lang)->firstOrFail();

//        $ancestors = $article->category->ancestorsAndSelf()->get();
//        $ancestors->push(new ArticleCategory(['name' => $article->title]));

        return view('article.show', [
            'article' => $article,
//            'ancestors' => $ancestors,
        ]);
    }

}
