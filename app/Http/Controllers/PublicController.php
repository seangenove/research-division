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

    public function resolution() {
        LogUtility::insertLog("HttpRequest on /resolution",'public');
        return view('public.resolution');
    }

    public function ordinance() {
        LogUtility::insertLog("HttpRequest on /ordinance",'public');
        return view('public.ordinance');
    }

    public function monitorAndEval() {
        LogUtility::insertLog("HttpRequest on /monitorAndEval",'public');
        return view('public.monitorAndEval');
    }

    public function about() {
        LogUtility::insertLog("HttpsRequest on /about",'public');
        return view('public.about');
    }

    public function contactUs() {
        LogUtility::insertLog("HttpRequest on /contactUs",'public');
        return view('public.contactUs');
    }

    public function aboutDiv() {
        LogUtility::insertLog("HttpRequest on /aboutDiv",'public');
        return view('public.aboutDiv');
    }

    public function reports() {
        LogUtility::insertLog("HttpRequest on /reports",'public');
        return view('public.reports');
    }

    public function showOrdinance (){
        LogUtility::insertLog("HttpRequest on /showOrdinance",'public');
//        $ordinance = Ordinance::findOrFail($id);
        return view('public.showOrdinance');
    }
}
