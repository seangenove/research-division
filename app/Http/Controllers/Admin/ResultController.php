<?php

namespace App\Http\Controllers\Admin;

use App\Questionnaire;
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

        // NOTE: An alternative for the above query
        $questionnaire = Questionnaire::find($id);
        $allQuestions = $questionnaire->questions;
        $numOfQuestions = $allQuestions->count();
        $answers = Answer::all();

//        foreach($allQuestions as $question){
//            $answers = $question->answers;
//            // Echo Question name
//            echo "Question: " . $question->question . "<br>";
//            // echo all answers
//            echo "Answers Array:<br>";
//            echo "<pre>$answers</pre>";
//            echo "<br>";
//
////        }
//        echo $numOfQuestions;
//        dd();



        return view('admin.result.show')
            ->with('answers',$answers)
            ->with('questions',$allQuestions);
    }
}
