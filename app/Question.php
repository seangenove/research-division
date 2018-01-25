<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'question', 'required', 'type'
    ];

    /**
     * Returns all values for a given question
     */
    public function values()
    {
        return $this->hasMany('App\Value');
    }

    /**
     * Returns all values for a given question
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    /**
     * Returns a key value pair array of all the counts of each answer in json format
     */
    public function getAnswerCounts(){
        $answers = Question::find($this->id)->answers;
        $answer_counts = [];
        foreach ($answers as $answer) {
            $answer_string = $answer->answer;
            if (array_key_exists($answer_string, $answer_counts)) {
                $answer_counts[$answer_string]++;
            } else{
                $answer_counts[$answer_string] = 1;
            }
        }
        return json_encode($answer_counts);
    }
}
