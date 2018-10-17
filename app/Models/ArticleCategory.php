<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ArticleCategory extends Model
{
    use SoftDeletes;

    /**
     * @param int $root
     * @return Collection
     */
    public function tree($root = 0)
    {
        return Cache::rememberForever('article_categories', function () use ($root) {
            return (new ArticleCategory)->findTree($root);
        });
    }

    public function findTree($root = 0)
    {
        $categories = ArticleCategory::parent($root)->get();

        foreach ($categories as $category) {
            $category->children = $this->tree($category->id);
        }

        return $categories;
    }

    public function scopeParent($query, $id)
    {
        return $query->where('parent_id', $id);
    }


}
