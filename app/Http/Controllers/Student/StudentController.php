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

    /**
     * Récupère les infos saisies et affiche dans la page dashboard
     *
     * @param StudentRepository $repository => for controller traitement
     * @return redirect view back student with message $dasboard in Session
    */
    public function index(StudentRepository $repository) {

        $this->authorize('student', User::class);

        $seeDashboard = $repository->getDashboard();

        return view('back.student.dashboard',[
            'title'         =>'Tableau de Bord',
            'totalScore'    => $seeDashboard['totalScore'],
            'totalQuestion' => $seeDashboard['totalQuestion'],
            'totalQcm'      => $seeDashboard['totalQcm'],
            'isNewQcm'      => $seeDashboard['isNewQcm']
            ]);

    }

    /**
     * Récupère les infos (qcm) et affiche dans la page index du qcm
     *
     * @param Request $request => it's use for get data and validate them
     * @return redirect view back student with message $indexQcm in Session
    */
    public function qcmIndex(Request $request, StudentRepository $repository) {

        $this->authorize('student', User::class);

        $indexQcm = $repository->getQcmForRole($request->perPage);

        return view('back.student.qcm.index',[
            'title'     =>'Qcm Elèves',
            'qcms'      => $indexQcm['qcms'],
            'perPage'   => $indexQcm['perPage'],
            'userId'    => $indexQcm['userId'],
            'userRole'  => $indexQcm['userRole']
        ]);

    }

    /**
     * Récupère les réponses (qcm) et affiche dans la page index du qcm
     *
     * @param Qcm $qcm => QCM en cours de traitement
     * @param Request $request => it's use for get data and validate them
     * @return redirect view back student with message $indexQcm in Session
    */
    public function qcmRespond(Qcm $qcm, StudentRepository $repository) {

        $this->authorize('student', User::class);

        $qcmRespond = $repository->qcmRespond($qcm);

        return view('back.student.qcm.respond',[
            'title'         => 'QCM',
            'qcm'           => $qcm,
            'qcmTitle'      => $qcmRespond['qcmTitle'],
            'qcmQuestion'   => $qcmRespond['qcmQuestion'],
            'userRole'      => $qcmRespond['userRole']
        ]);

    }

   /**
     * Récupère le score du QCM
     *
     * @param Qcm $qcm => QCM en cours de traitement
     * @param Request $request => it's use for get data and validate them
     * @param StudentRepository $repository => for controller traitement
     * @return redirect view back student with message $indexQcm in Session
    */
    public function qcmCalculateScore(Qcm $qcm, StudentQcmRequest $request, StudentRepository $repository) {

        $this->authorize('student', User::class);
        
        $score = $repository->qcmCalculateScore($qcm, $request);
        $getResponse = $repository->createScore($score, $qcm);
        
        return redirect()->route('student.qcm.index')->with('message', $getResponse);

    }
}
