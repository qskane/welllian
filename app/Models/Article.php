<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function scopeDocument($query)
    {
        return $query->where('article_category_id', config('web.article.document_category'));
    }

    public function scopeCategory($query, $id)
    {
        return $query->where('article_category_id', $id);
    }

    public function scopePublished($query, $status = true)
    {
        return $query->where('published', $status);
    }

}
