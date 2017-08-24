<?php

namespace App\Repositories;

use DB;
use App\Qcm;


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

    public function getIndexQcms($perPage)
    {
    	if ( !isset($perPage)) {
    		$perPage = 5;
    	}
    	
        $qcms    = $this->qcm->OrderBy('created_at','DESC')->paginate($perPage);
        $nb_qcms = count($qcms);

        return ['qcms' => $qcms, 'nb_qcms' => $nb_qcms, 'perPage' => $perPage];
    }


    public function makeActionStore($request)
    {
        
        $qcm['title'] = $request->title;
        $qcm['nb_question'] = $request->nb_question;
        $qcm['class_level'] = $request->class_level;
        $qcm['status'] = isset($request->status) ? 'on' : 'off' ;
        
        return session(['new_qcm' =>  $qcm ]);

    }


    /*public function makeActionUpdate($request, $post)
    {

        return $message;
    }*/


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