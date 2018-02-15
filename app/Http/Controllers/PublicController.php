<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\OrdinancesController;
use App\Http\Controllers\Controller;
use App\Http\LogUtility;
use App\Ordinance;
use App\Resolution;
use App\Response;
use App\StatusReport;
use App\Suggestion;
use App\Page;
use App\Question;
use App\Questionnaire;
use App\UpdateReport;
use App\Value;
use App\Answer;
use DB;
use Illuminate\Support\Facades\Storage;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    const RR = 'RR';
    const ordinanceColumns = [
        'number',
        'series',
        'title',
        'keywords',
    ];
    public function downloadPDF($directory, $filename) {

        if(env('APP_ENV') === 'local') {

            return response()->download(storage_path().'/app/public/'.$directory.'/'.$filename);

        } else {
            $file = app('App\Http\Controllers\Admin\OrdinancesController')->getFileFromCloud($filename);

            //return $file; // array with file info
            $rawData = Storage::cloud()->get($file['path']);

            return response($rawData, 200)
                ->header('ContentType', $file['mimetype'])
                ->header('Content-Disposition', "attachment; filename='$filename'");
        }
    }

    public function deletePDF($directory, $filename){
        $instanceID = substr($filename,0);

        // Get instance (Ordinance, Resolution, UpdateReport, StatusReport), then update certain fields
        if ($directory === 'updatereports') {
            $instance = UpdateReport::findOrFail($instanceID);

            $instance->is_deleted = 1;
            $instance->save();
        } else {
            if ($directory === 'ordinances') {
                $instance = Ordinance::findOrFail($instanceID);
            } elseif ($directory === 'resolutions') {
                $instance = Resolution::findOrFail($instanceID);
            } elseif ($directory === 'statusreports') {
                $instance = StatusReport::findOrFail($instanceID);
            }

            $instance->pdf_file_path = " ";
            $instance->pdf_file_name = " ";
            $instance->save();
        }

        // Set directory for the blade (admin.ordinances.show OR admin.resolutions.show)
        // FOR GOOGLE DRIVE UPLOAD
        if($directory === 'statusreports' or $directory === 'updatereports'){
            // Check if it is associated to a resolution or a ordinance
            if ($instance->resolution !== null) {
                $directory = 'resolutions';

                // set its Resolution instance
                $instance = $instance->resolution;
            } else {
                $directory =  'ordinances';

                // set its Ordinance instance
                $instance = $instance->ordinance;
            }
        }

        // DELETE FILE
        if(env('APP_ENV') === 'local') {
            Storage::disk('local')->delete(storage_path().'/app/public/'.$directory.'/'.$filename);

            Session::flash('flash_message', 'Successfully deleted file!');
            return redirect('/admin/' . $directory . '/' . $instance->id);
        } else {
            $file = app('App\Http\Controllers\Admin\OrdinancesController')->getFileFromCloud($filename);

            // Delete File
            Storage::disk('google')->delete($file['path']);

            return response()
                ->view('admin.deleteSuccess',
                    [
                        'directory' => $type,
                        'instance' => $instance,
                    ],
                    200);

        }
    }

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
        $limit = 10;
        $colName = $request->colName;
        $order = $request->order;

        // Check if there is a provided column to be sorted
        if (!$colName) {
            $colName = 'created_at';
        }

        // Check if there is a provided order
        if (!$order) {
            $order = 'desc';
        }

        if ($request->q) {
            $q = $request->q;
            $resolutions = Resolution::where(function($query) use ($q){
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%')
                    ->orderBy('series', 'desc');
            })->where(function($query){
                $query->where('is_monitoring', 0)
//                    ->orWhere('is_monitoring', 1)
                    ->orderBy('series', 'desc');
            });
        } else {
            $resolutions = Resolution::where('is_monitoring', 0)
//                ->orWhere('is_monitoring', 1)
                ->orderBy('series', 'desc');
        }

        // Implement filtering / sorting
        $resolutions = $resolutions->orderBy($colName, $order);

        // Paginate with filters
        $resolutions = $resolutions->paginate($limit)->appends($request->all());

        return view('public.resolution', [
            'resolutions' => $resolutions,
            'type' => PublicController::RR,]);
    }

    public function ordinance(Request $request)
    {
        LogUtility::insertLog("HttpRequest on /ordinance", 'public');
        $limit = 10;
        $colName = $request->colName;
        $order = $request->order;

        // Check if there is a provided column to be sorted
        if (!$colName) {
            $colName = 'created_at';
        }

        // Check if there is a provided order
        if (!$order) {
            $order = 'desc';
        }
//        if ($request->q) {
//            $q = $request->q;
//            $ordinances = Ordinance::where('keywords', 'LIKE', '%' . $q . '%')
//                ->orWhere('number', 'LIKE', '%' . $q . '%')
//                ->orWhere('series', 'LIKE', '%' . $q . '%')
//                ->orWhere('title', 'LIKE', '%' . $q . '%')
//                ->orderBy('created_at', 'desc')
//                ->get();
////            $ordinances = $ordinances->where('is_monitoring', 0);
//        } else {
//            $ordinances = DB::table('ordinances')
////                ->where('is_monitoring', 0)
//                ->orderby('id', 'desc')
//                ->get();
//        }
        if ($request->q) {
            $q = $request->q;
            $ordinances = Ordinance::where(function($query) use ($q){
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%')
                    ->orderBy('series', 'desc');
            })->where(function($query){
                $query->where('is_monitoring', 0)
//                    ->orWhere('is_monitoring', 1)
                    ->orderBy('series', 'desc');
            });
        } else {
            $ordinances = Ordinance::where('is_monitoring', 0)
//                ->orWhere('is_monitoring', 1)
                ->orderBy('series', 'desc');
        }

        // Implement filtering / sorting
        $ordinances = $ordinances->orderBy($colName, $order);

        // Paginate with filters
        $ordinances = $ordinances->paginate($limit)->appends($request->all());
//        dd($ordinances);
        return view('public.ordinance', [
            'ordinances' => $ordinances,
            'type' => PublicController::RR,
        ]);
    }

    public function monitorAndEval(Request $request)
    {
        LogUtility::insertLog("HttpRequest on /monitorAndEval", 'public');
        $limit = 5;
        $colName = $request->colName;
        $order = $request->order;

        // Check if there is a provided column to be sorted
        if (!$colName) {
            $colName = 'created_at';
        }

        // Check if there is a provided order
        if (!$order) {
            $order = 'desc';
        }

        if ($request->q) {
            $q = $request->q;
            $ordinances = Ordinance::where(function ($query) use ($q) {
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%');
            })->where(function ($query) {
                $query->where('is_monitoring', 1);
            });
        } else {
            $ordinances = Ordinance::where('is_monitoring', 1);
        }

        // Implement filtering / sorting
        $ordinances = $ordinances->orderBy($colName, $order);

        // Paginate with filters
        $ordinances = $ordinances->paginate($limit)->appends($request->all());


        $limit = 5;
        $colName = $request->colName;
        $order = $request->order;

        // Check if there is a provided column to be sorted
        if (!$colName) {
            $colName = 'created_at';
        }

        // Check if there is a provided order
        if (!$order) {
            $order = 'desc';
        }

        if ($request->q) {
            $q = $request->q;
            $resolutions = Resolution::where(function ($query) use ($q) {
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%');
            })->where(function ($query) {
                $query->where('is_monitoring', 1);
            });
        } else {
            $resolutions = Resolution::where('is_monitoring', 1);
        }

        // Implement filtering / sorting
        $resolutions = $resolutions->orderBy($colName, $order);

        // Paginate with filters
        $resolutions = $resolutions->paginate($limit)->appends($request->all());

        return view('public.monitorAndEval', [
            'ordinances' => $ordinances,
            'resolutions' => $resolutions
        ]);
    }

    public function monitorAndEvalOrdinances(Request $request)
    {
        LogUtility::insertLog("HttpRequest on /monitorAndEvalOrdinances", 'public');
        $limit = 5;
        $colName = $request->colName;
        $order = $request->order;

        // Check if there is a provided column to be sorted
        if (!$colName) {
            $colName = 'created_at';
        }

        // Check if there is a provided order
        if (!$order) {
            $order = 'desc';
        }

        if ($request->q) {
            $q = $request->q;
            $ordinances = Ordinance::where(function ($query) use ($q) {
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%');
            })->where(function ($query) {
                $query->where('is_accepting', 1);
            });
        } else {
            $ordinances = Ordinance::where('is_accepting', 1);
        }

        // Implement filtering / sorting
        $ordinances = $ordinances->orderBy($colName, $order);

        // Paginate with filters
        $ordinances = $ordinances->paginate($limit)->appends($request->all());
        $resolutions = null;
        return view('public.monitorAndEval', [
            'ordinances' => $ordinances,
            'resolutions' => $resolutions,
            'type' => PublicController::RR,
        ]);
    }

    public function monitorAndEvalResolutions(Request $request)
    {
        LogUtility::insertLog("HttpRequest on /monitorAndEvalResolutions", 'public');
        $limit = 5;
        $colName = $request->colName;
        $order = $request->order;

        // Check if there is a provided column to be sorted
        if (!$colName) {
            $colName = 'created_at';
        }

        // Check if there is a provided order
        if (!$order) {
            $order = 'desc';
        }

        if ($request->q) {
            $q = $request->q;
            $resolutions = Resolution::where(function($query) use ($q){
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%');
            })->where(function($query){
                $query->where('is_accepting', 1);
            });
        } else {
            $resolutions = Resolution::where('is_accepting', 1);
        }

        // Implement filtering / sorting
        $resolutions = $resolutions->orderBy($colName, $order);

        // Paginate with filters
        $resolutions = $resolutions->paginate($limit)->appends($request->all());
//        dd($resolutions);

        $ordinances = null;
        return view('public.monitorAndEval', [
            'resolutions' => $resolutions,
            'ordinances' => $ordinances,
            'type' => PublicController::RR,]);
    }

    public function researchAndRecordsOrdinance(Request $request)
    {
        LogUtility::insertLog("HttpRequest on /researchAndRecordsOrdinances", 'public');
        $limit = 5;
        $colName = $request->colName;
        $order = $request->order;

        // Check if there is a provided column to be sorted
        if (!$colName) {
            $colName = 'created_at';
        }

        // Check if there is a provided order
        if (!$order) {
            $order = 'desc';
        }

        if ($request->q) {
            $q = $request->q;
            $ordinances = Ordinance::where(function ($query) use ($q) {
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%')
                    ->orderBy('series', 'desc');
            })->where(function ($query) {
                $query->where('is_monitoring', 0)
                    ->orderBy('series', 'desc');
            });
        } else {
            $ordinances = Ordinance::where('is_monitoring', 0)
                ->orderBy('series', 'desc');
        }

        // Implement filtering / sorting
        $ordinances = $ordinances->orderBy($colName, $order);

        // Paginate with filters
        $ordinances = $ordinances->paginate($limit)->appends($request->all());
        return view('public.ordinance', [
            'ordinances' => $ordinances,
            'type' => PublicController::RR,
        ]);
    }

    public function researchAndRecordsResolution(Request $request)
    {
        LogUtility::insertLog("HttpRequest on /researchAndRecordsResolution", 'public');
        $limit = 10;
        $colName = $request->colName;
        $order = $request->order;

        // Check if there is a provided column to be sorted
        if (!$colName) {
            $colName = 'created_at';
        }

        // Check if there is a provided order
        if (!$order) {
            $order = 'desc';
        }

        if ($request->q) {
            $q = $request->q;
            $resolutions = Resolution::where(function($query) use ($q){
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%')
                    ->orderBy('series', 'desc');
            })->where(function($query){
                $query->where('is_monitoring', 0)
                    ->orderBy('series', 'desc');
            });
        } else {
            $resolutions = Resolution::where('is_monitoring', 0)
                ->orderBy('series', 'desc');
        }

        // Implement filtering / sorting
        $resolutions = $resolutions->orderBy($colName, $order);

        // Paginate with filters
        $resolutions = $resolutions->paginate($limit)->appends($request->all());

        return view('public.resolution', [
            'resolutions' => $resolutions,
            'type' => PublicController::RR,]);
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
        $required=false;
        return view('public.showOrdinanceQuestionnaire', ['questionnaire' => $questionnaire], ['questions' => $questions])->with('values', $values)->with('required', $required);
    }

    public function showRequiredOrdinanceQuestionnaire($id)
    {
        LogUtility::insertLog("HttpRequest on /public/showOrdinance/{id}", 'public');
        $questionnaire = Questionnaire::Where('ordinance_id', '=', $id)->first();
        $questions = Question::Where('questionnaire_id', '=', $questionnaire->id)->get();
        $values = Value::WhereIn('question_id', $questions->pluck('id'))->get();
        $required=true;
        return view('public.showOrdinanceQuestionnaire', ['questionnaire' => $questionnaire], ['questions' => $questions])->with('values', $values)->with('required', $required);
    }

    public function submitOrdinanceAnswers(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required',
        ]);
        $requestData = $request->all();

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
                if (array_key_exists('1conditionalAnswer' . $i, $requestData)) {
                    if($requestData['1conditionalAnswer' . $i] != null){
                        $answer->answer = $requestData['answer' . $i].", ".$requestData['1conditionalAnswer' . $i];
                    }
                }
                if(array_key_exists('2conditionalAnswer' . $i, $requestData )){
                    if($requestData['2conditionalAnswer' . $i] != null){
                        $answer->answer = $requestData['answer' . $i].", ".$requestData['2conditionalAnswer' . $i];
                    }
                }
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
        $request->validate([
            'g-recaptcha-response' => 'required',
        ]);

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
        $required=false;
        return view('public.showOrdinanceQuestionnaire', ['questionnaire' => $questionnaire], ['questions' => $questions])->with('values', $values)->with('required',$required);
    }

    public function showRequiredResolutionQuestionnaire($id)
    {
        LogUtility::insertLog("HttpRequest on /public/showResolutionQuestionnaire/{id}", 'public');

        $questionnaire = Questionnaire::Where('resolution_id', '=', $id)->first();
        $questions = Question::Where('questionnaire_id', '=', $questionnaire->id)->get();
        $values = Value::WhereIn('question_id', $questions->pluck('id'))->get();
        $required=true;
        return view('public.showOrdinanceQuestionnaire', ['questionnaire' => $questionnaire], ['questions' => $questions])->with('values', $values)->with('required',$required);
    }
}
