<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\LogUtility;
use App\Ordinance;
use App\Resolution;
use App\Suggestion;
use App\Page;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        LogUtility::insertLog("HttpRequest on /", 'public');

        $ordinances = Ordinance::orderby('created_at', 'desc')
            ->limit(5)
            ->get();
        $resolutions = Resolution::orderby('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('public.index', ['resolutions' => $resolutions], ['ordinances' => $ordinances]);
    }

    public function resolutions()
    {
        LogUtility::insertLog("HttpRequest on /resolutions", 'public');

        $resolutions = DB::table('resolutions')
            ->orderby('created_at', 'desc')
            ->get();

        return view('public.resolution', ['resolutions' => $resolutions]);
    }

    public function ordinance()
    {
        LogUtility::insertLog("HttpRequest on /ordinance", 'public');
        $ordinances = DB::table('ordinances')
            ->orderby('created_at', 'desc')
            ->get();
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
    public function page($id)
    {
        $page = Page::findOrFail($id);
        LogUtility::insertLog("HttpRequest on /page/{id}", 'public');
        return view('public.page', [
            'page' => $page
        ]);
    }
    

    public function showOrdinance($id)
    {
        LogUtility::insertLog("HttpRequest on /public/showOrdinance/{id}", 'public');
        $ordinances = Ordinance::findOrFail($id)->first();
        return view('public.showOrdinance',['ordinances' => $ordinances]);
    }

    public function storeSuggestion(Request $request, $id){

        if ($request->input('type') === 'ordinance'){
            // Ordinances
            $suggestion = new Suggestion();
            $suggestion->first_name = $request->input('first_name');
            $suggestion->last_name = $request->input('last_name');
            $suggestion->email = $request->input('email');
            $suggestion->suggestion = $request->input('suggestion');
            $suggestion->save();

            // TODO: Refactorb to use M2M
            DB::table('ordinance_suggestion')->insert([
                'ordinance_id' => $id,
                'suggestion_id' => $suggestion->id
            ]);
        } elseif ($request->input('type') === 'resolution'){
            // Resolution
            $suggestion = new Suggestion();
            $suggestion->first_name = $request->input('first_name');
            $suggestion->last_name = $request->input('last_name');
            $suggestion->email = $request->input('email');
            $suggestion->suggestion = $request->input('suggestion');
            $suggestion->save();

            // TODO: Refactorb to use M2M
            DB::table('resolution_suggestion')->insert([
                'resolution_id' => $id,
                'suggestion_id' => $suggestion->id
            ]);
        }
    }

    public function showResolution($id)
    {
        LogUtility::insertLog("HttpRequest on /public/showResolution/{id}", 'public');

        $resolutions = Resolution::findOrFail($id)->first();

        return view('public.showResolution', ['resolutions' => $resolutions]);
    }
}
