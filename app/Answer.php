<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer'
    ];


    public static function getAnswerCount($questionId){
        $answers = Question::find($questionId)->answers;
        $answer_counts = [];
        foreach ($answers as $answer){
            $current_count = Answer::where('question_id',$questionId)
                ->where('answer', $answer->answer)->count();
            $answer_counts[] = [
                'answer' => $answer->answer,
                'count' => $current_count
            ];
        }
        return $answer_counts;
    }
}
