<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Resolution extends Model
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
        'description',
        'authors',
        'date_approved_by_council',
        'date_signed_by_vice_mayor',
        'date_signed_by_mayor',
        'pdf_file_path',
    ];

    /**
     * Returns all suggestion for a given resolution
     */
    public function suggestions()
    {
        return $this->belongsToMany('App\Suggestion');
    }
}
