<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Qcm;
use App\Question;

use App\Http\Requests\QcmRequest;
use App\Repositories\QcmRepository;

use Validator;
use Input;

class QcmController extends Controller
{
    use UserMember;

    public function __construct(Request $request)
    {
        $this->setUser();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, QcmRepository $repository)
    {
        
        $this->authorize('view', Qcm::class);

        $indexQcms = $repository->getIndexQcms($request->perPage);

        return view('back.qcm.index',[
            'title'     => 'Liste des QCM',
            'qcms'      => $indexQcms['qcms'],
            'nb_qcms'   => $indexQcms['nb_qcms'],
            'perPage'   => $indexQcms['perPage']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Qcm $qcm)
    {
        $this->authorize('create', $qcm);

        return view('back.qcm.create', [
            'title' => 'Ajouter un QCM'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Qcm $qcm)
    {
        $this->authorize('update', $qcm);
        
        return view('back.qcm.edit', [
            'title'     => 'Éditer ce QCM',
            'qcm'       => $qcm,
            'question'  => $qcm->questions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Qcm $qcm, Request $request, QcmRepository $repository)
    {
        $rules = array(
            'title'       => 'bail|required|string|min:5|max:50', 
            'class_level' => 'in:premiere,terminale'
        );

        $messages = array(
            'class_level.in'        => 'Veuillez choisir le bon niveau',
            'title.required'        => 'Vous devez définir un titre',
            'title.string'          => 'Le titre doit être une phrase',
            'title.min'             => 'Le titre doit avoir minimum 5 caractères',
            'title.max'             => 'Le titre doit avoir maximum 50 caractères',
        );


        // Input::offsetUnset('_token');
        // Input::offsetUnset('_method');
        //echo '<pre>'.print_r(Input::all(),1).'</pre>';

        //$qcmValidator = Validator::make([Input::get('title','class_level')], $rules, $messages );
        $qcmValidator = Validator::make(['title'=> $request->title,'class_level'=>$request->class_level], $rules, $messages );

        //$qcmValidator2 = Validator::make([Input::get('class_level')], $rules, $messages );

        // Input::offsetUnset('title');
        // Input::offsetUnset('status');
        // Input::offsetUnset('class_level');

        //$questionValidator = Validator::make([Input::get('title')], $rules, $messages );
        // echo $questionValidator.'<br>';
        // echo '<pre>'.print_r($qcmValidator,1).'</pre>';
        // dd();
        // Run validators, return errors on fail()
        if($qcmValidator->fails()){
          $errors = $qcmValidator->messages();

          return redirect()->route('qcm.edit',$qcm)->withInput()->withErrors($qcmValidator);
        }
        //dd($qcmValidator);

        return redirect()->route('qcm.index')->with('message', $repository->makeActionUpdate($qcm, $request));

    }

    public function updateStatus(Request $request, Qcm $qcm, QcmRepository $repository)
    {
        $this->authorize('status', Qcm::class);

        return redirect()->route('qcm.index')->with('message', $repository->makeActionUpdateStatus($request, $qcm));

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qcm $qcm, QcmRepository $repository)
    {
        $this->authorize('delete', $qcm); // politique d'accès 
        
        return redirect()->route('qcm.index')->with('message', $repository->makeActionDelete($qcm));
    }
}
