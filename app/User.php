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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes 
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all posts associated with the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get all scores associated with the user.
     */
    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    /**
     * Vérifie si le role de l'user est un professeur
     */
    public function isTeacher(){
        return $this->role === 'teacher'; 
    }

    /**
     * Vérifie si le role de l'user est un élève de première
     */
    public function isFirstClass(){
        return $this->role === 'first_class';
    }

    /**
     * Vérifie si le role de l'user est un élève de terminale
     */
    public function isFinalClass(){
        return $this->role === 'final_class';
    }
}
