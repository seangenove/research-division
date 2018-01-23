<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    //
    public function index()
    {
        return view('admin.result.show');
    }// no data passed


    public function show($id)
    {
        $allAnswers = DB::table('answers')
            ->join('responses','answers.response_id' , '=' , 'responses.id')
            ->where('responses.questionnaire_id' , '=' ,$id)
            ->get();

        $allQuestions = DB::table('answers')
            ->join('responses','answers.response_id' , '=' , 'responses.id')
            ->join('questions', 'responses.questionnaire_id' ,'=', 'questions.questionnaire_id')
            ->where('responses.questionnaire_id' , '=' ,$id)
            ->get();

 //    dd($allAnswers);
//        dd($allQuestions);

        return view('admin.result.show')
            ->with('answers',$allAnswers)
            ->with('questions',$allQuestions);
    }
}
