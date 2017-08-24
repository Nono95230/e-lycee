<?php

namespace App\Policies;

use App\User;
use App\Qcm;
use Illuminate\Auth\Access\HandlesAuthorization;

class QcmPolicy
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
     * Determine whether the user can view all qcms.
     *
     * @param  \App\User  $user
     * @param  \App\Qcm  $qcm
     * @return mixed
     */
    public function view(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can create qcm.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the qcm.
     *
     * @param  \App\User  $user
     * @param  \App\Qcm  $qcm
     * @return mixed
     */
    public function update(User $user, Qcm $qcm)
    {
        
        return false;

    }

    /**
     * Determine whether the user can delete the qcm.
     *
     * @param  \App\User  $user
     * @param  \App\Qcm  $qcm
     * @return mixed
     */
    public function delete(User $user, Qcm $qcm)
    {
        //abort(403,'Unauthorized action');
        return false;
    }
    /**
     * Determine whether the user can published or unpublished the qcm.
     *
     * @param  \App\User  $user
     * @param  \App\Qcm  $qcm
     * @return mixed
     */
    public function status(User $user, Qcm $qcm)
    {
        //abort(403,'Unauthorized action');
        return false;
    }
}
