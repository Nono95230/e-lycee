<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Qcm;

use App\Http\Requests\QcmRequest;

use App\User;

use App\Repositories\QcmRepository;

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
    public function index(QcmRepository $qcm,Request $request)
    {
        
        $this->authorize('view', Qcm::class);

        $indexQcms = $qcm->getIndexQcms($request->perPage);

        return view('back.qcm.index',
            [
                'title'     => 'Liste des QCM',
                'qcms' => $indexQcms['qcms'],
                'nb_qcms'=> $indexQcms['nb_qcms'],
                'perPage'=> $indexQcms['perPage']
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

        return view('back.qcm.create', ['title' => 'Ajouter un QCM']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QcmRequest $request)
    {
        $qcm['title'] = $request->title;
        $qcm['nb_question'] = $request->nb_question;
        $qcm['class_level'] = $request->class_level;
        $qcm['status'] = isset($request->status) ? 'on' : 'off' ;
        session(['new_qcm' =>  $qcm ]);

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateStatus(Request $request, Qcm $qcm)
    {
        // $this->authorize('status', Question::class);

        $thisQcm = $qcm->find($request->id);
        $title = $thisQcm->title;

        $thisQcm->updateStatus($request->status);
        $thisQcm->update();
        $status  = ($request->status === 'on')? 'publié': 'dépublié';
        $message = [
            'success',
            sprintf('Le QCM %s à bien été '.$status, $title)
        ];
        return redirect()->route('qcm.index')->with('message', $message);

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qcm $qcm)
    {
        $this->authorize('delete', $qcm); // politique d'accès 
        
        $qcmTitle = $qcm->title;

        $qcm->delete();

        $message = [
            'success',
            sprintf('Suppression du qcm %s effectuée avec succès !', $qcmTitle)
        ];

        return redirect()->route('qcm.index')->with('message', $message);
    }
}
