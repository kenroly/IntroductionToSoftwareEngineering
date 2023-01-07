<?php

namespace App\Policies;

use App\Models\user;
use App\Models\reader;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReaderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(user $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\user  $user
     * @param  \App\Models\reader  $reader
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(user $user, reader $reader)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(user $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\user  $user
     * @param  \App\Models\reader  $reader
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(user $user, reader $reader)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\user  $user
     * @param  \App\Models\reader  $reader
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(user $user, reader $reader)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\user  $user
     * @param  \App\Models\reader  $reader
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(user $user, reader $reader)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\user  $user
     * @param  \App\Models\reader  $reader
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(user $user, reader $reader)
    {
        //
    }
}
