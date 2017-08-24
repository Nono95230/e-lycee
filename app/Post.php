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
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getUserId(){
        return Auth::user()->id;
    }

    public function getUrlThumbnailAttribute() {
        return $this->attributes['url_thumbnail'];
    }

    public function setUserId($value){
        $this->attributes['user_id'] = $value;
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
    }


    /*public function setStatusAttribute($value){
        if ( $value === 'on' ) {
            $this->attributes['status'] = 'published';
        }
        else{
            $this->attributes['status'] = 'unpublished';
        }
    }*/


    /*public function setPublishedAtAttribute($value){
        if ( $this->attributes['status'] === 'published' ) {
            if ($this->attributes['published_at'] === null) {
                $this->attributes['published_at'] = Carbon::now();
            }
        }
    }*/
    
    
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
