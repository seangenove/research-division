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
        'description',
        'authors',
        'date_approved_by_council',
        'date_signed_by_vice_mayor',
        'date_signed_by_mayor',
        'pdf_file_name',
    ];

    /**
     * Get the suggestions for the blog post.
     */
    public function suggestions()
    {
//        dd(DB::table('ordinance_suggestion')->where('ordinance_id', 1)->get());
        return $this->belongsToMany('App\Suggestion');
    }
}
