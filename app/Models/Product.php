<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    public function mall()
    {
        return $this->hasOne(Mall::class);
    }


    public function store()
    {
        return $this->hasOne(Store::class);
    }

}
