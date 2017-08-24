<?php

namespace App\Policies;

use App\User;
use App\Question;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
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
     * Determine whether the user can view all questions.
     *
     * @param  \App\User  $user
     * @param  \App\Question  $question
     * @return mixed
     */
    public function view(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can create question.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the question.
     *
     * @param  \App\User  $user
     * @param  \App\Question  $question
     * @return mixed
     */
    public function update(User $user, Question $question)
    {
        
        return false;

    }

    /**
     * Determine whether the user can delete the question.
     *
     * @param  \App\User  $user
     * @param  \App\Question  $question
     * @return mixed
     */
    public function delete(User $user, Question $question)
    {
        //abort(403,'Unauthorized action');
        return false;
    }
    /**
     * Determine whether the user can published or unpublished the question.
     *
     * @param  \App\User  $user
     * @param  \App\Question  $question
     * @return mixed
     */
    public function status(User $user, Question $question)
    {
        //abort(403,'Unauthorized action');
        return false;
    }
}
