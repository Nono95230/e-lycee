<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DashboardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view student dashboard.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function student(User $user)
    {
        return ( $user->isFirstClass() | $user->isFinalClass() )? true : false ;
    }

    /**
     * Determine whether the user can view teacher dashboard.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function teacher(User $user)
    {
        return $user->isTeacher();
    }


}
