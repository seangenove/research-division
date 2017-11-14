<?php

namespace App\Http\Controllers\Admin;

use App\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogsController extends Controller
{
    /**
     * View for all logs
     * Route: /admin/logs/index
     * */
    public function index(){
        return view('admin.logs.index', [
            'logs' => Log::orderBy('id', 'desc')->get()
        ]);
    }
}
