<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Plusieurs posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    // Plusieurs commentaires
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    // Un score unique par QCM
    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    // Roles des USERS (teacher, first_class, final_class)
    public function isTeacher(){

        return $this->role === 'teacher'; 

    }
    public function isFirstClass(){

        return $this->role === 'first_class';

    }
    public function isFinalClass(){

        return $this->role === 'final_class';

    }
}
