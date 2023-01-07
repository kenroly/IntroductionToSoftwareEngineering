<?php

namespace App\Policies;

use App\Models\user;
use App\Models\test;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
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
     * @param  \App\Models\test  $test
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(user $user, test $test)
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
     * @param  \App\Models\test  $test
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(user $user, test $test)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\user  $user
     * @param  \App\Models\test  $test
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(user $user, test $test)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\user  $user
     * @param  \App\Models\test  $test
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(user $user, test $test)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\user  $user
     * @param  \App\Models\test  $test
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(user $user, test $test)
    {
        //
    }
}
