<?php

namespace App\Models;

use Baum\Node;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ArticleCategory extends Node
{
    /**
     * @return Collection
     */
    public function tree()
    {
        return Cache::rememberForever('article_categories', function () {
            return ArticleCategory::roots()->get()->map(function ($category) {
                return $category->setRelation(
                    'children',
                    $category->getDescendants()->toHierarchy()
                );
            });
        });
    }


    public function documents()
    {
        $tree = $this->tree();
        $category = config('web.article.document_category');
        foreach ($tree as $item) {
            if ($item->id === $category) {
                return $item->children;
            }
        }
    }


    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
