<?php

namespace App\Models;

use App\Events\MediaSaved;
use App\Models\Concerns\HasOwner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Media extends Model
{
    use SoftDeletes, HasOwner;

    protected $table = 'medias';

    protected $guarded = [];

    protected $dispatchesEvents = [
        'saved' => MediaSaved::class,
    ];

    public function setDomainAttribute($value)
    {
        $this->attributes['domain'] = Str::lower($value);
    }

    public function setUserId($userId = null)
    {
        $this->attributes['user_id'] = $userId ?? Auth::id();

        return $this;
    }

    public function setGenerateValues()
    {
        $this->attributes['key'] = Str::lower(str_random(config('web.media.key_length')));
        $this->attributes['secret'] = Str::lower(str_random(config('web.media.secret_length')));
        $this->attributes['verification_key'] = str_random(config('web.media.verification_key_length'));

        return $this;
    }

    public function simpleCreate($returnInstance = true)
    {
        $this->attributes['user_id'] = $this->attributes['user_id'] ?? Auth::id();
        $this->attributes['key'] = Str::lower(str_random(config('web.media.key_length')));
        $this->attributes['secret'] = Str::lower(str_random(config('web.media.secret_length')));
        $this->attributes['verification_key'] = str_random(config('web.media.verification_key_length'));
        $saved = $this->save();

        return $returnInstance ? $this : $saved;
    }


    public function scopeVerified($query, $status = true)
    {
        return $query->where('verified', $status);
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

    public function scopeConsumable($query, $status = true)
    {
        /*
         * verified = true && consuming = true && consume_bid >= wallets.coin
         */
        return $query->where('consumable', $status);
    }

    public function scopeConsuming($query, $status = true)
    {
        return $query->where('consuming', $status);
    }

}
