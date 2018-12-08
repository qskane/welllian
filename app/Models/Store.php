<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{

    public function mall()
    {
        return $this->hasOne(Mall::class);
    }


}
