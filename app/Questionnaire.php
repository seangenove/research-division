<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Questionnaire extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'description', 'question', 'answer'
    ];

    /**
     * Returns all questions for a given questionnaire
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    /**
     * Returns The associated ordinance
     */
    public function ordinance()
    {
        return $this->belongsTo('App\Ordinance');
    }

    /**
     * Returns the associated resolution
     */
    public function resolution()
    {
        return $this->belongsTo('App\Resolution');
    }

    /**
     * Returns true if a questionnaire with associated questions has answers
     */
    public function hasAnswers()
    {
        foreach($this->questions as $q){
           if ($q->answers->count() != 0){
            return true;
           }
        }
        return false;
    }
}
