<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'content',
        'answer',
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
     * Get the qcm associated with the question.
     */
    public function qcm()
    {
        return $this->belongsTo('App\Qcm');
    }

   /**
     * Mets à jour la question 
     */
    public function updateThisQuestion($value)
    {
        $this->attributes['content'] = $value['content'];
        $this->attributes['answer'] = $value['answer'];
        $this->update();
    }
}
