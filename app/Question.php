<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
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
}
