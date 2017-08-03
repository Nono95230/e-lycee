<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    public function scores()
    {
        return $this->hasMany('App\Score');
    }
    public function choices()
    {
        return $this->hasMany('App\Choice');
    }
}
