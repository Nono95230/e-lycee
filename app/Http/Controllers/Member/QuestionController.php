<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;

use App\Http\Requests\QuestionRequest;

use App\User;


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
    public function index(Question $question)
    {
        
        $this->authorize('view', $question);
        
        $perPage = 5;
        $questions    = $question->paginate($perPage);

        return view('back.question.index',
            ['title'     => 'Liste des QCM',
             'questions' => $questions,
             'perPage'   => $perPage
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question)
    {
        $this->authorize('create', $question);

        return view('back.question.create', ['title' => 'Ajouter un QCM']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $qcm['title'] = $request->title;
        $qcm['nb_choice'] = $request->nb_choice;
        $qcm['class_level'] = $request->class_level;
        $qcm['status'] = isset($request->status) ? 'on' : 'off' ;
        session(['new_qcm' =>  $qcm ]);
        
        return redirect()->route('choice.create');
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

    public function updateStatus(Request $request, Question $question)
    {
        // $this->authorize('status', Question::class);

        $thisQuestion = $question->find($request->id);
        $title = $thisQuestion->title;

        $thisQuestion->updateStatus($request->status);
        $thisQuestion->update();
        $status  = ($request->status === 'on')? 'publié': 'dépublié';
        $message = [
            'success',
            sprintf('Le QCM %s à bien été '.$status, $title)
        ];
        return redirect()->route('question.index')->with('message', $message);

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
