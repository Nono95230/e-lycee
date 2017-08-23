<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;
use App\Choice;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\ChoiceRequest;

use App\User;

class ChoiceController extends Controller
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
    public function create(Request $request, Choice $choice)
    {

        $this->authorize('create', $choice);

        $qcm = $request->session()->get('qcm');
        $qcm_title = $qcm['title'];
        $qcm_nb_choice = $qcm['nb_choice'];

        return view('back.choice.create', ['title' => 'Ajouter les questions','qcm_title'=>$qcm_title,'nb_choice' => $qcm_nb_choice]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $question = Question::create();
        $choice = Choice::create($request->all());
        
        // Session 
        $qcm = $request->session()->get('qcm');
        $qcm_title = $qcm['title'];
        $qcm_status = $qcm['status'];
        $qcm_class_level = $qcm['class_level'];
        
        // Enregistre
        $choice->save();

        $message = [
            'success',
            sprintf('Merci d\'avoir ajouter le QCM %s !', $question->title)
        ];
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
