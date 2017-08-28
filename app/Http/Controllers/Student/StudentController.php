<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Traits\UserMemberTrait;

use App\Repositories\StudentRepository;

use Auth;

class StudentController extends Controller
{

    use UserMemberTrait;

    public function __construct(Request $request)
    {

        $this->setUser();
    }

    public function index() {

        return view('back.student.dashboard',['title'=>'Dashboard Elèves']);

    }

    public function qcmIndex(Request $request, StudentRepository $repository) {

    	$indexQcm = $repository->getQcmForRole($request->perPage);

        return view('back.student.qcm.index',[
        	'title'=>'Qcm Elèves',
        	'qcms'=> $indexQcm['qcms'],
        	'perPage'=>$indexQcm['perPage'],
        	'userId' =>$indexQcm['userId']
    	]);

    }



}
