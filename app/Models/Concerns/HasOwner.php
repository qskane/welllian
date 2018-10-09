<?php

namespace App\Models\Concerns;


use Illuminate\Support\Facades\Auth;

trait HasOwner
{

    public function isOwner($column = 'user_id')
    {
        return $this->{$column} === Auth::id();
    }

    public function scopeOwner($query, $userId = null)
    {
        return $query->where('user_id', $userId ?? Auth::id());
    }

}
