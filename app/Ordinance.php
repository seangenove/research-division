<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Ordinance extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'title',
        'series',
        'keywords',
        'is_accepting',
        'pdf_file_path',
        'is_monitoring',
    ];

    /**
     * Returns all suggestion for a given ordinance
     */
    public function suggestions()
    {
        return $this->belongsToMany('App\Suggestion');
    }
}
