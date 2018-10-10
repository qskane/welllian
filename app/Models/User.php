<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

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

    public function isDefaultName()
    {
        return $this->name === $this->generateDefaultName();
    }

    public function generateDefaultName($mobile = null)
    {
        $mobile = $mobile ?? $this->mobile;

        return substr($mobile, 0, 3) . '*****' . substr($mobile, -3);
    }

    public function hashPassword($password)
    {
        return Hash::make($password);
    }

    public function simpleCreate($returnInstance = true)
    {
        $this->attributes['name'] = $this->generateDefaultName($this->attributes['mobile']);
        $this->attributes['password'] = $this->hashPassword($this->attributes['password']);
        $saved = $this->save();

        return $returnInstance ? $this : $saved;

    }


}
