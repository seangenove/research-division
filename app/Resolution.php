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
        'series',
        'title',
        'keywords',
        'is_accepting',
        'pdf_file_path',
        'pdf_file_name',
        'is_monitoring',
    ];

    /**
     * Returns all suggestion for a given resolution
     */
    public function suggestions()
    {
        return $this->belongsToMany('App\Suggestion');
    }

    public function statusReport()
    {
        return $this->hasOne('App\StatusReport');
    }

    public function updateReport()
    {
        return $this->hasMany('App\UpdateReport');
    }
}
