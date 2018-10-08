<?php

namespace App\Models\Helper;


use Illuminate\Support\Facades\Auth;

trait HasOwner
{

    public function isOwner($column = 'user_id')
    {
        return $this->{$column} === Auth::id();
    }

}
