<?php

namespace App\Policies;

use App\Models\User;

class TemplatePolicy extends ResourcePolicy
{


    public function view(User $user, $model)
    {
        return $user->id === $model->{$this->column}
            || $model->{$this->column} === config('web.official_user_id');
    }

}
