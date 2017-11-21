<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Questionnaire extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
}
