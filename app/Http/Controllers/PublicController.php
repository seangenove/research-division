<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\LogUtility;
use DB;

class PublicController extends Controller
{
    public function index()
    {
        LogUtility::insertLog("HttpRequest on /", 'public');

        $resolutions = DB::table('resolutions')->get();

        return view('public.index', ['resolutions' => $resolutions]);
    }

    public function resolutions()
    {
        LogUtility::insertLog("HttpRequest on /resolutions", 'public');

        $resolutions = DB::table('resolutions')->get();

        return view('public.resolution', ['resolutions' => $resolutions]);
    }

    public function ordinance()
    {
        LogUtility::insertLog("HttpRequest on /ordinance", 'public');
        return view('public.ordinance');
    }

    public function monitorAndEval()
    {
        LogUtility::insertLog("HttpRequest on /monitorAndEval", 'public');
        return view('public.monitorAndEval');
    }

    public function about()
    {
        LogUtility::insertLog("HttpRequest on /about", 'public');
        return view('public.about');
    }

    public function contactUs()
    {
        LogUtility::insertLog("HttpRequest on /contactUs", 'public');
        return view('public.contactUs');
    }

    public function aboutDiv()
    {
        LogUtility::insertLog("HttpRequest on /aboutDiv", 'public');
        return view('public.aboutDiv');
    }

    public function reports()
    {
        LogUtility::insertLog("HttpRequest on /reports", 'public');
        return view('public.reports');
    }

    public function showResolution()
    {
        LogUtility::insertLog("HttpRequest on /showResolution", 'public');
        return view('public.showResolution');
    }
}
