<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    //
    public function show()
    {
        return view('admin.result.show');
    }
}
