<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Media extends Model
{
    use SoftDeletes;

    protected $table = 'medias';

    protected $guarded = [];

    public function scopeOwner($query)
    {
        return $query->where('user_id', Auth::id());
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

    public function scopeKey($query, $key)
    {
        return $query->where('key', $key);
    }

    public function scopeConsumeAble($query)
    {
        return $query->where(['verified' => true, 'consuming' => true, 'available' => true]);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id', 'user_id');
    }

    public function scopeAvailable($query, $status = true)
    {
        return $query->where('available', $status);
    }

}
