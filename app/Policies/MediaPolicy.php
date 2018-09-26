<?php

namespace App\Policies;

use App\Models\User;

class MediaPolicy extends ResourcePolicy
{

    public function verification(User $user, $model)
    {
        return $user->id === $model->{$this->column};
    }

}
