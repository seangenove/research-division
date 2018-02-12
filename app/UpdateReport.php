<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateReport extends Model
{
    protected $fillable = [
        'pdf_file_name',
        'pdf_file_path',
        'ordinance_id',
        'resolution_id',
        'is_deleted',
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
}
