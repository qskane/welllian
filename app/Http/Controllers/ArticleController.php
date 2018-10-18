<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{

    public function index()
    {
        return redirect()->route('article.category.show', config('web.article.document_category'));
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

    public function show($id)
    {
        $article = Article::published()->findOrFail($id);

        $ancestors = $article->category->ancestorsAndSelf()->get();

        $ancestors->push(new ArticleCategory(['name' => $article->title]));

        return view('article.show', [
            'article' => $article,
            'ancestors' => $ancestors,
        ]);
    }

}
