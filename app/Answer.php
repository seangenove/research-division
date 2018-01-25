<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer'
    ];


    public static function getAnswerCount($questionId)
    {
        $answers = Question::find($questionId)->answers;
//        $answers = answer
        $answer_counts = [];
        foreach ($answers as $answer) {
            $answer_string = $answer->answer;
            if (array_key_exists($answer_string, $answer_counts)) {
                $answer_counts[$answer_string]++;
            } else{
                $answer_counts[$answer_string] = 1;
            }
        }
        return $answer_counts;
        dd();
    }
}
