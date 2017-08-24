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

}