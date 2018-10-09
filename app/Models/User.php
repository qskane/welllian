<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = ['name', 'mobile', 'password', 'remember_token'];

    protected $hidden = ['password', 'remember_token'];

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function verifiedMedias()
    {
        return Media::verified()->get();
    }

}
