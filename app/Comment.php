<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Presenters\DatePresenter;

class Comment extends Model
{
    use DatePresenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'post_id'
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
    
    public function posts()
    {
        return $this->belongsTo('App\Post');
    }

    public function setPostId($value){
        $this->attributes['post_id'] = $value;
    }

}
