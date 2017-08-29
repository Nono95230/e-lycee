<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Traits\UserMemberTrait;

use App\Repositories\StudentRepository;

use App\Http\Requests\StudentQcmRequest;
use Auth;
use App\Qcm;
use App\User;

class StudentController extends Controller
{

    use UserMemberTrait;

    public function __construct(Request $request)
    {
        $this->setUser();
    }

    public function index(StudentRepository $repository) {

        $this->authorize('student', User::class);

        $seeDashboard = $repository->getDashboard();

        //dd($seeDashboard['scores']);
        //dd($seeDashboard['qcms']);
        return view('back.student.dashboard',[
            'title'         =>'Tableau de Bord',
            'totalScore'    => $seeDashboard['totalScore'],
            'totalQuestion' => $seeDashboard['totalQuestion'],
            'totalQcm'      => $seeDashboard['totalQcm'],
            'isNewQcm'      => $seeDashboard['isNewQcm']
            ]);

    }

    public function qcmIndex(Request $request, StudentRepository $repository) {

        $this->authorize('student', User::class);

        $indexQcm = $repository->getQcmForRole($request->perPage);

        return view('back.student.qcm.index',[
            'title'=>'Qcm Elèves',
            'qcms'=> $indexQcm['qcms'],
            'perPage'=>$indexQcm['perPage'],
            'userId' =>$indexQcm['userId'],
            'userRole' =>$indexQcm['userRole']
        ]);

    }

    public function qcmRespond(Qcm $qcm, StudentRepository $repository) {

        $this->authorize('student', User::class);

        $qcmRespond = $repository->qcmRespond($qcm);

        return view('back.student.qcm.respond',[
            'title'         => 'QCM',
            'qcm'           => $qcm,
            'qcmTitle'      => $qcmRespond['qcmTitle'],
            'qcmQuestion'   => $qcmRespond['qcmQuestion']
        ]);

    }

    public function qcmCalculateScore(Qcm $qcm, StudentQcmRequest $request, StudentRepository $repository) {

        $this->authorize('student', User::class);
        
        $score = $repository->qcmCalculateScore($qcm, $request);
        $getResponse = $repository->createScore($score, $qcm);
        
        return redirect()->route('student.qcm.index')->with('message', $getResponse);
    

    }





}
