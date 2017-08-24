<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Qcm;
use App\Question;

use App\Http\Requests\QcmRequest;
use App\Http\Requests\QuestionRequest;

use App\User;

use App\Repositories\QuestionRepository;

class QuestionController extends Controller
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
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Question $question, QuestionRepository $repository)
    {

        $this->authorize('create', $question);

        $createQuestion = $repository->makeActionCreate($request);

        return view('back.question.create', ['title' => 'Ajouter les questions',
            'qcm_title' => $createQuestion['title'],
            'nb_question'=> $createQuestion['nb_question']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request, QuestionRepository $repository)
    {
        
        return redirect()->route('qcm.index')->with('message', $repository->makeActionStore($request));

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
