<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\LogUtility;
use App\Resolution;
use DB;
use Carbon\Carbon;

class PublicController extends Controller
{
    public function index()
    {
        LogUtility::insertLog("HttpRequest on /", 'public');

        $date = new Carbon;
        $date->subWeek();
        $resolutions = Resolution::where("date_signed_by_mayor", ">", $date)
            ->whereNotNull('date_signed_by_mayor')
            ->orderby('date_signed_by_mayor', 'desc')
            ->get();

        $ordinances = DB::table('ordinances')->get();

        return view('public.index', ['resolutions' => $resolutions], ['ordinances' => $ordinances]);
    }

    public function resolutions()
    {
        LogUtility::insertLog("HttpRequest on /resolutions", 'public');

        $resolutions = DB::table('resolutions')
            ->whereNotNull('date_signed_by_mayor')
            ->orderby('date_signed_by_mayor', 'desc')
            ->get();

        return view('public.resolution', ['resolutions' => $resolutions]);
    }

    public function ordinance()
    {
        LogUtility::insertLog("HttpRequest on /ordinance", 'public');
        $ordinances = DB::table('ordinances')->get();
        return view('public.ordinance', ['ordinances' => $ordinances]);
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

    public function showOrdinance()
    {
        LogUtility::insertLog("HttpRequest on /showOrdinance", 'public');
        return view('public.showOrdinance');
    }

    public function showResolution($id)
    {
        LogUtility::insertLog("HttpRequest on /showResolution", 'public');

        $resolutions = Resolution::findOrFail($id)->get();

        return view('public.showResolution', ['resolutions' => $resolutions]);
    }
}
