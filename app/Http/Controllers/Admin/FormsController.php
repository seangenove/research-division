<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormsController extends Controller
{

    /**
     * Index page for Forms - Listing of all available forms
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('forms.index');
    }

    public function create(){
        return view('forms.create');
    }
}
