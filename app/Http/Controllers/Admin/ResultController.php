<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    //
    public function index()
    {
        return view('admin.result.show');
    }// no data passed


    public function show($id)
    {
        return view('admin.result.show');
    }
}
