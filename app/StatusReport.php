<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusReport extends Model
{
    protected $fillable = [
        'pdf_file_name',
        'pdf_file_path',
        'ordinance_id',
        'resolution_id',
    ];

    /**
     * Returns all suggestion for a given ordinance
     */
    public function ordinance()
    {
        return $this->belongsTo('App\Ordinance');
    }

    public function resolution()
    {
        return $this->belongsTo('App\Resolution');
    }

    public function updateReports(){
        return $this->hasMany('App\UpdateReport');
    }
}
