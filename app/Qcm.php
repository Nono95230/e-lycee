<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Presenters\DatePresenter;

class Qcm extends Model
{
    use DatePresenter;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'title',
		'class_level',
		'status'
	];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['nb_question'];


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
    
    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function setStatusAttribute($value){
        if ( $value === 'on' ) {
            $this->attributes['status'] = 'published';
        } else{
            $this->attributes['status'] = 'unpublished';
        }
    }
    
    public function updateStatus($value){
        if ( $value === 'on' ) {
            $this->attributes['status'] = 'published';
        } else if( $value === null ){
            $this->attributes['status'] = 'unpublished';
        }
    }

    public function updateThisQcm($value)
    {
        $this->attributes['title'] = $value->title;
        $this->attributes['class_level'] = $value->class_level;
        $this->attributes['status'] =( isset($value->status) && $value->status === 'on')? 'published' : 'unpublished' ;
        $this->update();
    }

}
