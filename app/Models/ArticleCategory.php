<?php

namespace App\Models;

use Baum\Node;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ArticleCategory extends Node
{
    /**
     * @param int $root
     * @return Collection
     */
    public function tree($root = 0)
    {
        return Cache::rememberForever('article_categories', function () use ($root) {
            return ArticleCategory::roots()->get()->map(function ($category) {
                return $category->setRelation(
                    'children',
                    $category->getDescendants()->toHierarchy()
                );
            });
        });
    }

}
