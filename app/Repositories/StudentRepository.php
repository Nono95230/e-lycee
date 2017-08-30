<?php

namespace App\Repositories;

use DB;
use App\Qcm;
use App\Score;

use Auth;

class StudentRepository
{

    protected $qcm;
    protected $score;

    public function __construct(Qcm $qcm, Score $score)
    {
        $this->qcm      = $qcm;
        $this->score    = $score;
    }

    /**
     * Sert à récupérer les statistiques ( QCM en cours, nombre de QCM, score)
     *
     * @return value in Session $dashboard
    */
    public function getDashboard(){

        $userId = Auth::user()->id;
        $scores = $this->score->where('user_id',$userId)->get();

        $userRole = Auth::user()->role;
        $classLevel = ( $userRole === 'first_class')? 'premiere':'terminale';
        $allQcmPublished = $this->qcm->where('status', 'published' )->where('class_level', $classLevel )->get()->count();

        $dashboard['totalScore']    = 0;
        $dashboard['totalQcm']      = 0;
        $dashboard['totalQuestion'] = 0;
        $getAllIdQcms               = array();

        foreach ($scores as $index => $score) {
            $dashboard['totalQcm']++;
            $dashboard['totalScore'] +=$score->note;
            array_push($getAllIdQcms, $score->qcm_id);
        }

        $dashboard['isNewQcm'] = ($dashboard['totalQcm'] < $allQcmPublished)? true : false ;
        
        for ($i=0; $i < $dashboard['totalQcm']; $i++) { 
            $qcms   = $this->qcm->where('id', $getAllIdQcms[$i] )->get();
            foreach ($qcms as $index => $qcm) {
                $dashboard['totalQuestion'] += $qcm->questions->count();
            }
        }
        
        return $dashboard;
    }
    
    /**
     * permet d'afficher le dashboard avec le role de l'élève ainsi que la pagination
     *
     * @return array value in Session 
    */
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

    /**
     * Affiche le QCM en fonction du niveau de l'élève
     *
     * @return array value in Session 
    */
    public function qcmRespond($qcm)
    {
        $qcmTitle = $qcm->title;
        $qcmQuestion = $qcm->questions;

        $userRole = Auth::user()->role;
        if ( Auth::user()->role === 'first_class' ) {
            $userRole = 'premiere';
        } elseif( Auth::user()->role === 'final_class' ){
            $userRole = 'terminale';
        }
        
        return ['qcmTitle'=> $qcmTitle,'qcmQuestion'=> $qcmQuestion,'userRole'=>$userRole];
    }

    /**
     * Permet de de calculer et de récupérer le score 
     *
     * @return value in Session $dashboard
    */
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

    /**
     * Permet de sauvegarder le score 
     *
     * @return value in Session $message
    */
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