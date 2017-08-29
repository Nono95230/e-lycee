<?php

namespace App\Repositories;

use DB;
use App\Qcm;
use App\Score;

use Auth;



class StudentRepository
{

    protected $qcm;

    public function __construct(Qcm $qcm)
    {
        $this->qcm = $qcm;
    }

    public function getQcmForRole($perPage)
    {
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;
        if ( Auth::user()->role === 'first_class' ) {
            $userRole = 'premiere';
        } elseif( Auth::user()->role === 'final_class' ){
            $userRole = 'terminale';
        }

        if ( !isset($perPage)) {
            $perPage = 5;
        }
        
        $qcms = $this->qcm->where('qcms.status', "published")->where('qcms.class_level', $userRole)->orderBy('created_at', "DESC")->paginate(10);

        return ['qcms'=> $qcms,'perPage'=> $perPage,'userId'=>$userId,'userRole'=>$userRole];
    }

    public function qcmRespond($qcm)
    {
        $qcmTitle = $qcm->title;
        $qcmQuestion = $qcm->questions;

        return ['qcmTitle'=> $qcmTitle,'qcmQuestion'=> $qcmQuestion];
    }

    public function qcmCalculateScore($qcm, $request)
    {

        $score = 0;
        //Transform the array $request
        $iteration = 0;
        $newQuestion = array();
        foreach ($request->all() as $key => $value) {
            if(strpos($key,'answer') !== false ){
                $newQuestion[$iteration]['answer'] = $value;
                $iteration++;
            }
        }

        //Update All Question
        foreach ($qcm->questions as $index => $question) {
            //echo $question->answer.' === '.$newQuestion[$index]['answer'].' ? '.($question->answer === $newQuestion[$index]['answer'] ? 'True' : 'False').'<br>';
            if ($question->answer === $newQuestion[$index]['answer']) {
                $score += 1;
            }
        }
        //dd();
        return $score;
    }

    public function createScore($score,$qcm)
    {
        $newScore = new Score;
        $newScore->state    = 'fait';
        $newScore->note     = $score;
        $newScore->qcm_id   = $qcm->id;
        $newScore->user_id  = Auth::user()->id;
        $newScore->save();

        //return success message in session
        $message = [
            'success',
            'Félicitations ! Vous avez terminé ce qcm. Votre score est de '.$score.' sur '.count($qcm->questions)
        ];

        return $message;

    }

}