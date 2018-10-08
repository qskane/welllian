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

    /*

$table->unsignedInteger('user_id')->index();
$table->string('name');
$table->string('domain');
$table->string('promotion_url');
$table->string('logo')->default('');
$table->string('description')->default('');
$table->string('key', 16);
$table->string('secret', 16);
$table->string('verification_key', 32);
$table->boolean('verified')->default(false);
$table->boolean('providing')->default(true);
$table->boolean('consuming')->default(true);
$table->unsignedInteger('consume_bid')->default(1);
 */
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

}
