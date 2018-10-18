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
        if (is_array($id)) {
            return $query->whereIn('article_category_id', $id);
        }

        return $query->where('article_category_id', $id);
    }

    public function scopePublished($query, $status = true)
    {
        return $query->where('published', $status);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id', 'id');
    }

}
