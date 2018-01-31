<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\LogUtility;
use App\Ordinance;
use App\Resolution;
use App\Response;
use App\Suggestion;
use App\Page;
use App\Question;
use App\Questionnaire;
use App\Value;
use App\Answer;
use DB;
use Session;
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

    public function resolutions(Request $request)
    {
        LogUtility::insertLog("HttpRequest on /resolutions", 'public');

        if ($request->q) {
            $q = $request->q;
            $resolutions = Resolution::where('keywords', 'LIKE', '%' . $q . '%')
                ->orWhere('number', 'LIKE', '%' . $q . '%')
                ->orWhere('series', 'LIKE', '%' . $q . '%')
                ->orWhere('title', 'LIKE', '%' . $q . '%')
                ->orderBy('created_at', 'desc')
                ->get();
            $resolutions = $resolutions->where('is_monitoring', 0);

        } else {
            $resolutions = DB::table('resolutions')
                ->where('is_monitoring', 0)
                ->orderby('created_at', 'desc')
                ->get();
        }

        return view('public.resolution', ['resolutions' => $resolutions]);
    }

    public function ordinance(Request $request)
    {
        LogUtility::insertLog("HttpRequest on /ordinance", 'public');
        if ($request->q) {
            $q = $request->q;
            $ordinances = Ordinance::where('keywords', 'LIKE', '%' . $q . '%')
                ->orWhere('number', 'LIKE', '%' . $q . '%')
                ->orWhere('series', 'LIKE', '%' . $q . '%')
                ->orWhere('title', 'LIKE', '%' . $q . '%')
                ->orderBy('created_at', 'desc')
                ->get();
            $ordinances = $ordinances->where('is_monitoring', 0);
        } else {
            $ordinances = DB::table('ordinances')
                ->where('is_monitoring', 0)
                ->orderby('created_at', 'desc')
                ->get();
        }

        return view('public.ordinance', ['ordinances' => $ordinances]);
    }

    public function monitorAndEval()
    {
        LogUtility::insertLog("HttpRequest on /monitorAndEval", 'public');
        $ordinances = DB::table('ordinances')->where("is_monitoring", '=', 1)
            ->orderby('created_at', 'desc')
            ->get();

        $resolutions = DB::table('resolutions')->where("is_monitoring", '=', 1)
            ->orderby('created_at', 'desc')
            ->get();

        return view('public.monitorAndEval', ['ordinances' => $ordinances, 'resolutions' => $resolutions]);
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

        $ordinance = Ordinance::findOrFail($id);
        $questionnaire = Questionnaire::where('ordinance_id', '=', $id)->where('isAccepting', '=', 1)->get();
        return view('public.showOrdinance', ['ordinance' => $ordinance], ['questionnaire' => $questionnaire]);
    }

    public function showOrdinanceQuestionnaire($id)
    {
        LogUtility::insertLog("HttpRequest on /public/showOrdinance/{id}", 'public');
        $questionnaire = Questionnaire::Where('ordinance_id', '=', $id)->first();
        $questions = Question::Where('questionnaire_id', '=', $questionnaire->id)->get();
        $values = Value::WhereIn('question_id', $questions->pluck('id'))->get();
        return view('public.showOrdinanceQuestionnaire', ['questionnaire' => $questionnaire], ['questions' => $questions])->with('values', $values);
    }

    public function submitOrdinanceAnswers(Request $request)
    {

        $requestData = $request->all();
//        dd($requestData);

        $response = new Response;
        $response->firstname = $request->firstname;
        $response->lastname = $request->lastname;
        $response->email = $request->email;
        $response->date = Carbon::now();
        $response->questionnaire_id = $request->questionnaire_id;
        $response->save();

        if ($request->type === 'ordinance') {
            $document = Questionnaire::Where('ordinance_id', '=', $request->id)->first()->ordinance;
        } else {
            $document = Questionnaire::Where('resolution_id', '=', $request->id)->first()->resolution;
        }

        for ($i = 1; $i < $requestData['counter']; $i++) {
            if (array_key_exists('answer' . $i, $requestData)) {
                $answer = new Answer;
                $answer->answer = $requestData['answer' . $i];
                $answer->question_id = $requestData['question_id' . $i];
                $answer->response_id = $response->id;
                $answer->save();
            }
        }
        Session::flash('flash_message', 'Thank you for answering the questionnaire for ' . $document->title);
        return redirect('monitorAndEval');
    }

    public function storeSuggestion(Request $request, $id)
    {

        if ($request->input('type') === 'ordinance') {
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
        } elseif ($request->input('type') === 'resolution') {
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

        $resolution = Resolution::findOrFail($id);
        $questionnaire = Questionnaire::where('resolution_id', '=', $id)->where('isAccepting', '=', 1)->get();
        return view('public.showResolution', ['resolution' => $resolution], ['questionnaire' => $questionnaire]);
    }

    public function showResolutionQuestionnaire($id)
    {
        LogUtility::insertLog("HttpRequest on /public/showResolutionQuestionnaire/{id}", 'public');

        $questionnaire = Questionnaire::Where('resolution_id', '=', $id)->first();
        $questions = Question::Where('questionnaire_id', '=', $questionnaire->id)->get();
        $values = Value::WhereIn('question_id', $questions->pluck('id'))->get();
        return view('public.showOrdinanceQuestionnaire', ['questionnaire' => $questionnaire], ['questions' => $questions])->with('values', $values);
    }
}
