<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Qcm;
use App\Question;

use App\Http\Requests\QcmRequest;
use App\Repositories\QcmRepository;

use App\Http\Traits\UserMemberTrait;

class QcmController extends Controller
{
    use UserMemberTrait;

    public function __construct(Request $request)
    {
        $this->setUser();
    }

    /**
     * Display a listing of the resource.
     * @param Request $request => it's use for get data and validate them
     * @param QcmRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, QcmRepository $repository)
    {
        
        $this->authorize('view', Qcm::class);

        $indexQcms = $repository->getIndexQcms($request->perPage);

        return view('back.teacher.qcm.index',[
            'title'     => 'Liste des QCM',
            'qcms'      => $indexQcms['qcms'],
            'nb_qcms'   => $indexQcms['nb_qcms'],
            'perPage'   => $indexQcms['perPage']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @param Qcm $qcm => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function create(Qcm $qcm)
    {
        $this->authorize('create', $qcm);

        return view('back.teacher.qcm.create', [
            'title' => 'Ajouter un QCM'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QcmRequest $request => it's use for get data and validate them
     * @param QcmRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function store(QcmRequest $request, QcmRepository $repository)
    {
        $repository->makeActionStore($request);

        return redirect()->route('question.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qcm $qcm
     * @return \Illuminate\Http\Response
     */
    public function edit(Qcm $qcm)
    {
        $this->authorize('update', $qcm);
        
        return view('back.teacher.qcm.edit', [
            'title'     => 'Éditer ce QCM',
            'qcm'       => $qcm,
            'question'  => $qcm->questions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Qcm $qcm
     * @param Request $request => it's use for get data and validate them
     * @param QcmRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function update(Qcm $qcm, Request $request, QcmRepository $repository)
    {
      //Validation Data !
      $validatorResponse = $repository->validationBeforeUpdate($qcm, $request);

      //Check Errors...
      $potentialErrors = $repository->detectErrors($validatorResponse);

      //Redirect if detect an error
      if( isset($potentialErrors)){
        return redirect()->route('qcm.edit',$qcm)->withInput()->withErrors($potentialErrors);
      }
      
      //Else Update data
      $response = $repository->makeActionUpdate($qcm, $request);

      //Redirect To Index
      return redirect()->route('qcm.index')->with('message', $response);

    }

    /**
     * Update the status.
     *
     * @param Qcm $qcm
     * @param Request $request => it's use for get data and validate them
     * @param QcmRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Qcm $qcm, QcmRepository $repository)
    {
        $this->authorize('status', Qcm::class);

        return redirect()->route('qcm.index')->with('message', $repository->makeActionUpdateStatus($request, $qcm));

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Qcm $qcm => it's use for get data and validate them
     * @param QcmRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qcm $qcm, QcmRepository $repository)
    {
        $this->authorize('delete', $qcm); // politique d'accès 
        
        return redirect()->route('qcm.index')->with('message', $repository->makeActionDelete($qcm));
    }
}
