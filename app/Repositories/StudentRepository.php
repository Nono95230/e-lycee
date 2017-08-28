<?php

namespace App\Repositories;

use DB;
use App\Qcm;

use Auth;



class StudentRepository
{

    protected $qcm;

    public function __construct(Qcm $qcm)
    {
        $this->qcm = $qcm;
    }

    /*public function getQcmForRole($role)
    {
        return $this->qcm->where('qcms.status', "published")->where('qcms.class_level', $role)->orderBy('created_at', "DESC")->paginate(10);
    }*/



    public function getQcmForRole($perPage)
    {
    	$userId = Auth::user()->id;
    	if ( Auth::user()->role === 'first_class' ) {
    		$userRole = 'premiere';
    	} elseif( Auth::user()->role === 'final_class' ){
    		$userRole = 'terminale';
    	}

        if ( !isset($perPage)) {
            $perPage = 5;
        }
        
        $qcms = $this->qcm->where('qcms.status', "published")->where('qcms.class_level', $userRole)->orderBy('created_at', "DESC")->paginate(10);

        return ['qcms'=> $qcms,'perPage'=> $perPage,'userId'=>$userId];
    }

}