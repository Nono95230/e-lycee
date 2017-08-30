<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Auth;

use App\Presenters\DatePresenter;

class Post extends Model
{

    use DatePresenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'title',
		'abstract',
		'content',
		'url_thumbnail',
		'status',
        'published_at',
        'user_id'
	];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['post_id'];


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
     * Get all comments related with the post
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the user related with the post
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get the url_thumbnail
     */
    public function getUrlThumbnailAttribute() {
        return $this->attributes['url_thumbnail'];
    }

    /**
     * Get the user id
     */
    public function getUserId(){
        return Auth::user()->id;
    }

    /**
     * Set the user id
     */
    public function setUserId($value){
        $this->attributes['user_id'] = $value;
    }

    /**
     * Set the title
     */
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
    }

    /**
     * Update the status and the published_at
     */
    public function updateStatus($value){
        if ( $value === 'on' ) {
            $this->attributes['status'] = 'published';
            if ( !isset($this->attributes['published_at']) ) {
                $this->attributes['published_at'] = Carbon::now();
            }
        } else if( $value === null ){
            $this->attributes['status'] = 'unpublished';
        }
    }
}
