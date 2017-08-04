<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user)
    {
        return false;
    }

    /**
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
        return $user->role == 'editor';
    }

    /**
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        
        return false;
        return $user->id === $post->user_id;

        /*echo 'user : '.$user->name.'<br>';
        echo 'robot_user : '.$robot->user->name;
        dd();*/
    }

    /**
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        //abort(403,'Unauthorized action');
        return false;
    }

}
