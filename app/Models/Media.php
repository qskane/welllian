<?php

namespace App\Models;

use App\Scopes\OwnerScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Media extends Model
{
    use SoftDeletes;

    protected $table = 'medias';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OwnerScope);
    }

    public function setDomainAttribute($value)
    {
        $this->attributes['domain'] = Str::lower($value);
    }

    public function setUserId($userId = null)
    {
        $this->attributes['user_id'] = $userId ?? Auth::id();
    }

    public function setGenerateValues()
    {
        $this->attributes['key'] = Str::lower(str_random(16));
        $this->attributes['secret'] = Str::lower(str_random(16));
        $this->attributes['verification_key'] = str_random(32);
    }

    public function scopeVerified($query)
    {
        return $query->where('verified', true);
    }

}
