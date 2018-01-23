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
}
