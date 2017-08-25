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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Question $question, QuestionRepository $repository)
    {

        $this->authorize('create', $question);

        $createQuestion = $repository->makeActionCreate($request);

        return view('back.question.create', ['title' => 'Ajouter des questions à ce QCM',
            'qcm_title' => $createQuestion['title'],
            'nb_question'=> $createQuestion['nb_question']]);
    }

    /**
     * Add a new question in the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addQuestion(Request $request, QuestionRepository $repository)
    {

        $repository->addNewQuestion($request);

        return redirect()->route('question.create');
    }

    /**
     * Remove a question in the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeQuestion(Request $request, QuestionRepository $repository)
    {

        $repository->removeLastQuestion($request);

        return redirect()->route('question.create');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
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
    public function update(Request $request, Question $question)
    {
        //
    }
}
