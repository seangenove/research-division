<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ordinance extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'title', 'description', 'authors'
    ];

    /**
     * Get the suggestions for the blog post.
     */
    public function suggestions()
    {
        return $this->hasMany('App\OrdinanceSuggestions');
    }
}
