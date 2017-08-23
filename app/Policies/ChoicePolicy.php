<?php

namespace App\Policies;

use App\User;
use App\Choice;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChoicePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function before(User $user, $ability)
    {
        if( $user->isTeacher() ) return true;
    }

    /**
     * Determine whether the user can view all choices.
     *
     * @param  \App\User  $user
     * @param  \App\Choice  $choice
     * @return mixed
     */
    public function view(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can create choice.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the choice.
     *
     * @param  \App\User  $user
     * @param  \App\Choice  $choice
     * @return mixed
     */
    public function update(User $user, choice $choice)
    {
        
        return false;

    }

    /**
     * Determine whether the user can delete the choice.
     *
     * @param  \App\User  $user
     * @param  \App\Choice  $choice
     * @return mixed
     */
    public function delete(User $user, choice $choice)
    {
        //abort(403,'Unauthorized action');
        return false;
    }
    /**
     * Determine whether the user can published or unpublished the choice.
     *
     * @param  \App\User  $user
     * @param  \App\Choice  $choice
     * @return mixed
     */
    public function status(User $user, choice $choice)
    {
        //abort(403,'Unauthorized action');
        return false;
    }
}
