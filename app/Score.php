<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{

    public function questions()
    {
        return $this->belongsTo('App\Question');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
