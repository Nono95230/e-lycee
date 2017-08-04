<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'user_id',
		'title',
		'abstract',
		'content',
		'url_thumbnail',
		'slug',
		'status',
        'published_at'
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

    public function setUserId($value){
        $this->attributes['user_id'] = $value;
    }

    public function setTitleAttribute($value) {

        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value,'-');

    }

    public function setStatusAttribute($value){

        $this->attributes['status'] = $value;
        if ($this->attributes['published_at'] === null) {
        	$this->attributes['published_at'] = ( $value ==='published')? Carbon::now() : null;
        } 

    }

    public function updateStatus($value){

    	if ( $value === 'on' ) {
    		$this->attributes['status'] = 'published';
    	} else if( $value === null ){
    		$this->attributes['status'] = 'unpublished';
    	}
    	
        /*if ($this->attributes['published_at'] === null) {
        	$this->attributes['published_at'] = ( $value === 'on' )? Carbon::now() : null;
        } */

    }
}
