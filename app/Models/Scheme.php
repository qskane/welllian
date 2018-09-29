<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scheme extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'name', 'container', 'quantity', 'media_id', 'template_id','running'];

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


}
