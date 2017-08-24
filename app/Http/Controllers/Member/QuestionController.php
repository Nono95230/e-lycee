<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Qcm;
use App\Question;

use App\Http\Requests\QcmRequest;
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
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Question $question)
    {

        $this->authorize('create', $question);

        $qcm = $request->session()->get('new_qcm');
        $qcm_title = $qcm['title'];
        $qcm_nb_question = $qcm['nb_question'];

        return view('back.question.create', ['title' => 'Ajouter les questions','qcm_title'=>$qcm_title,'nb_question' => $qcm_nb_question]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        
        $new_qcm = $request->session()->get('new_qcm');
        
        $qcm = new Qcm;
        $qcm->title = $new_qcm['title'];
        $qcm->status = $new_qcm['status'];
        $qcm->class_level = $new_qcm['class_level'];
        $qcm->save();

        $question = new Question;

        foreach($request->all() as $key => $value){
            
            if($key !== '_token'){
                if (isset($question->answer)) {
                    $question = new Question;
                }
                if (strpos($key,'content') !== false ) {
                    $question->content = $value;
                }
                if(strpos($key,'answer') !== false ){
                    $question->answer = $value;
                    $question->qcm_id = $qcm->id;
                    
                    $question->save();
                }

            }

        }
        
        $message = [
            'success',
            sprintf('Merci d\'avoir ajouter le QCM %s !', $new_qcm['title'])
        ];
        return redirect()->route('qcm.index')->with('message', $message);

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
