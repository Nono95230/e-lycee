<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'state',
		'note',
        'user_id',
        'qcm_id'
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
     * Get the qcm associated with the score.
     */
    public function qcm()
    {
        return $this->belongsTo('App\Qcm');
    }

   /**
     * Get the user associated with the score.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
