<?php

namespace App\Models;

use App\Scopes\OwnerScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OwnerScope);
    }

}
