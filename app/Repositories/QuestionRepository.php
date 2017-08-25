<?php

namespace App\Repositories;

use DB;
use App\Question;
use App\Qcm;


class QuestionRepository
{

    protected $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /*
     * FOR BACK PAGE
     */

    public function makeActionCreate($request)
    {
        $qcm = $request->session()->get('new_qcm');

        return [
        'title' => $qcm['title'],
        'nb_question' => $qcm['nb_question']
        ];
    }


    public function addNewQuestion($request)
    {
        $qcm = $request->session()->get('new_qcm');

        if ($qcm['nb_question'] < 30) {
            $qcm['nb_question'] += 1;
        }
        
        return session(['new_qcm' =>  $qcm ]);

    }

    public function removeLastQuestion($request)
    {
        $qcm = $request->session()->get('new_qcm');

        if ($qcm['nb_question'] > 5) {
            $qcm['nb_question'] -= 1;
        }
        
        return session(['new_qcm' =>  $qcm ]);
    }


    public function makeActionStore($request)
    {

        $new_qcm = $request->session()->get('new_qcm');
        
        $qcm = new Qcm;
        $qcm->title = $new_qcm['title'];
        $qcm->status = $new_qcm['status'];
        $qcm->class_level = $new_qcm['class_level'];
        $qcm->save();

        $question = new Question;

        foreach($request->all() as $key => $value){
            
            if($key !== '_token'){
                if (isset($question->answer)) {
                    $question = new Question;
                }
                if (strpos($key,'content') !== false ) {
                    $question->content = $value;
                }
                if(strpos($key,'answer') !== false ){
                    $question->answer = $value;
                    $question->qcm_id = $qcm->id;
                    
                    $question->save();
                }

            }

        }
        
        $message = [
            'success',
            sprintf('Merci d\'avoir ajouter le QCM %s !', $new_qcm['title'])
        ];

        return $message;
    }


    /*public function makeActionEdit()
    {

    }*/

    /*public function makeActionUpdate()
    {

    }*/





}