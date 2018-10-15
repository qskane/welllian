<?php

namespace App\Models;

use App\Models\Concerns\HasOwner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Scheme extends Model
{
    use SoftDeletes, HasOwner;

    protected $fillable = ['user_id', 'name', 'container', 'quantity', 'media_id', 'template_id', 'running'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function getRunning($value)
    {
        return (boolean)$value;
    }

    public function scopeRunning($query)
    {
        return $query->where('running', true);
    }

    public function scopeMediaId($query, $mediaId)
    {
        return $query->where('media_id', $mediaId);
    }


    public function scopeTemplate($query, $id)
    {
        return $query->where('template_id', $id);
    }

    public function simpleCreate($returnInstance = true)
    {
        $this->attributes['user_id'] = $this->attributes['user_id'] ?? Auth::id();
        $saved = $this->save();

        return $returnInstance ? $this : $saved;
    }


}
