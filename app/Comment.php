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
    
    /**
     * Get the post associated with the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

   /**
     * Set the post id
     *
     * @param $value
     */
    public function setPostId($value){
        $this->attributes['post_id'] = $value;
    }

}
