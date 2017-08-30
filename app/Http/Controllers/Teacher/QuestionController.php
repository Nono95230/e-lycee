<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Qcm;
use App\Question;

use App\Http\Requests\QcmRequest;
use App\Http\Requests\QuestionRequest;

use App\User;

use App\Repositories\QuestionRepository;

use App\Http\Traits\UserMemberTrait;

class QuestionController extends Controller
{
    use UserMemberTrait;

    public function __construct(Request $request)
    {

        $this->setUser();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request => it's use for get data and validate them
     * @param Question $question => it's use for get data and validate them
     * @param QuestionRepository $repository => for controller traitement
     * @return view create question with qcm title and number of question
     */
    public function create(Request $request, Question $question, QuestionRepository $repository)
    {

        $this->authorize('create', $question);

        $createQuestion = $repository->makeActionCreate($request);

        return view('back.teacher.question.create', ['title' => 'Ajouter des questions à ce QCM',
            'qcm_title' => $createQuestion['title'],
            'nb_question'=> $createQuestion['nb_question']]);
    }

    /**
     * Add a new question in the form for creating a new resource.
     *
     * @param Request $request => it's use for get data and validate them
     * @param QuestionRepository $repository => for controller traitement
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
     * @param Request $request => it's use for get data and validate them
     * @param QuestionRepository $repository => for controller traitement
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
     * @param Request $request => it's use for get data and validate them
     * @param QuestionRepository $repository => for controller traitement
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
