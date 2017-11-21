<?php

namespace App\Http\Controllers;

use App\Ordinance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicOrdinanceController extends Controller
{
    public function ordinanceShow($id)
    {
        $ordinance = Ordinance::findOrFail($id);

        return view('public.ordinanceShow', compact('ordinance'));
    }
}
