<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scheme extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function template()
    {
        return $this->hasOne(Template::class);
    }

    public function media()
    {
        return $this->hasOne(Media::class);
    }

}
