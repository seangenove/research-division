<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\LogUtility;


class PublicController extends Controller
{
    public function index() {
        LogUtility::insertLog("HttpRequest on /",'public');
        return view('public.index');
    }

    public function ordinance() {
        LogUtility::insertLog("HttpRequest on /ordinance",'public');
        return view('public.ordinance');
    }

    public function contactUs() {
        LogUtility::insertLog("HttpRequest on /contactUs",'public');
        return view('public.contactUs');
    }
}
