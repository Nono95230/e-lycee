<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Traits\UserMemberTrait;

use App\Repositories\StudentRepository;

use App\Http\Requests\StudentQcmRequest;
use Auth;
use App\Qcm;

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

    public function qcmRespond(Qcm $qcm, StudentRepository $repository) {

        $qcmRespond = $repository->qcmRespond($qcm);

        return view('back.student.qcm.respond',[
            'title'         => 'QCM',
            'qcm'           => $qcm,
            'qcmTitle'      => $qcmRespond['qcmTitle'],
            'qcmQuestion'   => $qcmRespond['qcmQuestion']
        ]);

    }

    public function qcmCalculateScore(Qcm $qcm, StudentQcmRequest $request, StudentRepository $repository) {

        //dd($qcm->questions);
        $score = $repository->qcmCalculateScore($qcm, $request);
        $getResponse = $repository->createScore($score, $qcm);
        
        return redirect()->route('student.qcm.index')->with('message', $getResponse);
    

    }





}
