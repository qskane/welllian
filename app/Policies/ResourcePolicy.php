<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcePolicy
{
    use HandlesAuthorization;

    protected $column = 'user_id';


    /**
     * Determine whether the user can view the media.
     *
     * @param  \App\Models\User $user
     * @param $model
     * @return boolean
     */
    public function view(User $user, $model)
    {
        return $user->id === $model->{$this->column};
    }

    /**
     * Determine whether the user can create media.
     *
     * @param  \App\Models\User $user
     * @return boolean
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the media.
     *
     * @param  \App\Models\User $user
     * @param $model
     * @return boolean
     */
    public function update(User $user, $model)
    {
        return $user->id === $model->{$this->column};
    }

    /**
     * Determine whether the user can delete the media.
     *
     * @param  \App\Models\User $user
     * @param $model
     * @return boolean
     */
    public function delete(User $user, $model)
    {
        return $user->id === $model->{$this->column};
    }

    /**
     * Determine whether the user can restore the media.
     *
     * @param  \App\Models\User $user
     * @param $model
     * @return boolean
     */
    public function restore(User $user, $model)
    {
        return $user->id === $model->{$this->column};
    }

    /**
     * Determine whether the user can permanently delete the media.
     *
     * @param  \App\Models\User $user
     * @param $media
     * @return boolean
     */
    public function forceDelete(User $user, $media)
    {
        return false;
    }
}
