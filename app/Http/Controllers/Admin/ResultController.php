<?php

namespace App\Http\Controllers\Admin;

use App\Questionnaire;
use DB;
use App\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Psy\Exception\ErrorException;

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

    public function downloadExcel($id)
    {
        try {
            Excel::create('file', function ($excel) use ($id) {
                $excel->sheet('Excel sheet', function ($sheet) use ($id) {
                    $questions_arr = [];
                    $answers_arr = [];
                    $count = 0;
                    $questionnaire = Questionnaire::find($id);
                    foreach ($questionnaire->questions as $question) {
                        $questions_arr[] = $question->question;
                        foreach ($question->answers as $answer) {
                            $answers_arr[$count][] = $answer->answer;// 0:
                        }
                        $count += 1;
                    }
                    $sheet->appendRow($questions_arr);
                    $rows = [];
                    for ($x = 0; $x < count($answers_arr); $x++) {
                        for ($y = 0; $y < count($answers_arr[$x]); $y++) {
                            $rows[$y][$x] = $answers_arr[$x][$y];
                        }
                    }
                    foreach ($rows as $row) {
                        $sheet->appendRow($row);
                    }

//                dd($rows);

                    $sheet->setOrientation('landscape');

                });
            })->export('xls');
        } catch (\Exception $e) {
            dd('Invalid query....');
        }

    }
}
