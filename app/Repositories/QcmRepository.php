<?php

namespace App\Repositories;

use DB;
use App\Qcm;

use Validator;

class QcmRepository
{

    protected $qcm;

    public function __construct(Qcm $qcm)
    {
        $this->qcm = $qcm;
    }

    /*
     * FOR BACK PAGE
     */
    
    /**
     * Permet d'afficher les QCM et de prendre en compte la pagination
     *
     * $perPage
     * @return Array
    */
    public function getIndexQcms($perPage)
    {
    	if ( !isset($perPage)) {
    		$perPage = 5;
    	}
    	
        $qcms    = $this->qcm->OrderBy('created_at','DESC')->paginate($perPage);
        $nb_qcms = count($qcms);

        return ['qcms' => $qcms, 'nb_qcms' => $nb_qcms, 'perPage' => $perPage];
    }

    /**
     * Permet d'enregistrer un QCM
     *
     * @param Request $request
     * @return Array value in session
    */
    public function makeActionStore($request)
    {
        
        $qcm['title'] = $request->title;
        $qcm['nb_question'] = $request->nb_question;
        $qcm['class_level'] = $request->class_level;
        $qcm['status'] = isset($request->status) ? 'on' : 'off' ;
        
        return session(['new_qcm' =>  $qcm ]);

    }

    /**
     * Vérifie s'il y a pas d'erreur avant validation
     *
     * @param Qcm $qcm
     * @param Requets $request
     * @return Array 
    */
    public function validationBeforeUpdate($qcm, $request)
    {
        // Name and Value Field Qcm
        $inputQcm = [
            'title'=> $request->title,
            'class_level'=>$request->class_level
        ];
        // Name and Value Field Question
        $inputQuestion = array();
        foreach ($request->all() as $key => $value) {
            if (strpos($key,'content') !== false ) {
                $inputQuestion[$key] = $value;
            }
            if(strpos($key,'answer') !== false ){
                $inputQuestion[$key] = $value;
            }
        }

        // Rules for Field Qcm
        $rulesQcm = array(
            'title'       => 'bail|required|string|min:5|max:50', 
            'class_level' => 'in:premiere,terminale'
        );

        // Rules for Field Question
        $rulesQuestion=array();
        foreach ($request->all() as $key => $value) {
            if (strpos($key,'content') !== false ) {
                $rulesQuestion[$key] = 'bail|required|string|max:160';
            }
            if(strpos($key,'answer') !== false ){
                $rulesQuestion[$key] = 'in:yes,no';
            }
        }

        // Messages for Field Qcm
        $messagesQcm = array(
            'title.required'        => 'Vous devez définir un titre',
            'title.string'          => 'Le titre doit être une phrase',
            'title.min'             => 'Le titre doit avoir minimum 5 caractères',
            'title.max'             => 'Le titre doit avoir maximum 50 caractères',
            'class_level.in'        => 'Veuillez choisir le bon niveau'
        );

        // Messages for Field Question
        $messagesQuestion=array();
        foreach ($request->all() as $key => $value) {
            if (strpos($key,'content') !== false ) {
                $messagesQuestion[$key.'.required'] = 'Vous devez définir cette question';
                $messagesQuestion[$key.'.string'] = 'La question doit être une phrase';
                $messagesQuestion[$key.'.max'] = 'La question ne doit pas être supérieure à 160 caractères';
            }
            if(strpos($key,'answer') !== false ){
                $messagesQuestion[$key.'.in'] = 'Vous devez choisir une réponse';
            }
        }

        $validatorQcm = Validator::make($inputQcm, $rulesQcm, $messagesQcm );
        
        $validatorQuestion = Validator::make($inputQuestion, $rulesQuestion, $messagesQuestion );

        return [
            'qcm'=>$validatorQcm,
            'question'=>$validatorQuestion
        ];

    }
    
    /**
     * Permet de détecter s'il y a une erreur
     *
     * @param $testData
     * @return $testData
    */
    public function detectErrors($testData){

      if( $testData['qcm']->fails() || $testData['question']->fails() ){
        return $testData['qcm']->messages()->merge($testData['question']->messages());

      }
    }

    /**
     * Permet de modifier un QCM
     *
     * @param Qcm $qcm => qcm en question
     * @param Requets $request
     * @return Array $message
    */
    public function makeActionUpdate($qcm, $request){

        //Update The Qcm
        $qcm->updateThisQcm($request);

        //Remove the useless field
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $request->offsetUnset('title');
        $request->offsetUnset('status');
        $request->offsetUnset('class_level');

        //Transform the array $request
        $iteration = 0;
        $newQuestion = array();
        foreach ($request->all() as $key => $value) {
            if (strpos($key,'content') !== false ) {
                $newQuestion[$iteration]['content'] = $value;
            }

            if(strpos($key,'answer') !== false ){
                $newQuestion[$iteration]['answer'] = $value;
                $iteration++;
            }
        }

        //Update All Question
        foreach ($qcm->questions as $key => $value) {
            $qcm->questions[$key]->updateThisQuestion($newQuestion[$key]);
        }

        //return success message in session
        $message = [
            'success',
            sprintf('La modification du QCM %s à été un succès !', $qcm->title)
        ];

        return $message;
      

    }

    /**
     * Permet de modifier le status du QCM
     *
     * @param Request $request
     * @param Qcm $qcm
     * @return Array $message
    */
    public function makeActionUpdateStatus($request, $qcm)
    {

        $thisQcm = $qcm->find($request->id);
        $title = $thisQcm->title;

        $thisQcm->updateStatus($request->status);
        $thisQcm->update();
        $status  = ($request->status === 'on')? 'publié': 'dépublié';
        
        $message = [
            'success',
            sprintf('Le QCM %s à bien été '.$status, $title)
        ];

        return $message;
    }

    /**
     * Permet de supprimer un QCM
     *
     * @param Qcm $qcm
     * @return Array $message
    */
    public function makeActionDelete($qcm)
    {

        $qcmTitle = $qcm->title;

        $qcm->delete();

        $message = [
            'success',
            sprintf('Suppression du qcm %s effectuée avec succès !', $qcmTitle)
        ];

        return $message;
    }

}