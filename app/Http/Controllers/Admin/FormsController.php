<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Questionnaire;
use App\Value;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FormsController extends Controller
{

    const ALL = 'ALL',
        RESOLUTIONS = 'resolutions',
        ORDINANCES = 'ordinances';

    /**
     * Index page for Forms - Listing of all available forms
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('forms.index', [
            'questionnaires' => Questionnaire::all(),
            'flag' => FormsController::ALL
        ]);
    }

    public function create()
    {
        return view('forms.create');
    }

    public function store(Request $request)
    {

        DB::transaction(function () use ($request) {
            // Json object passed by the view
            $questionnaire_object = json_decode($request->input('json-values'));
            // dd($questionnaire_object);
            $questionnaire = new Questionnaire();
            $questionnaire->name = $questionnaire_object->name;
            $questionnaire->description = $questionnaire_object->description;
            if ($questionnaire_object->associatedOrdinance){
                $questionnaire->ordinance_id = $questionnaire_object->associatedOrdinance;
            } elseif($questionnaire_object->associatedResolution){
                $questionnaire->resolution_id = $questionnaire_object->associatedResolution;
            } else{
                dd('Invalid Request...');
            }
            $questionnaire->saveOrFail();
            foreach ($questionnaire_object->questions as $q) {
                $new_question = new Question();
                $new_question->question = $q->question;
                $new_question->required = $q->required ? 1 : 0;
                $new_question->type = $q->type;
                $new_question->questionnaire_id = $questionnaire->id;

                $new_question->saveOrFail();
                // If type is checkbox/radio
                if ($q->type === 'radio' || $q->type === 'checkbox') {
                    // For each of the values
                    foreach ($q->values as $v) {
                        $new_val = new Value();
                        $new_val->value = $v->value;
                        $new_val->question_id = $new_question->id;
                        $new_val->saveOrFail();
                        $new_question->values()->save($new_val);
                    }
                }
                $questionnaire->questions()->save($new_question);
            }
        });

        return redirect('/admin/forms');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
//        DB::transaction(function () use ($id) {
        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire_json = new \stdClass();
        $questionnaire_json->name = $questionnaire->name;
        $questionnaire_json->description = $questionnaire->description;
        $questionnaire_json->questions = [];
        $temp = [];
        foreach ($questionnaire->questions as $q) {
            $temp_question = new \stdClass();
            $temp_question->question = $q->question;
            $temp_question->required = ($q->required === 1 ? true : false);
            $temp_question->type = $q->type;
            $temp_question->values = [];
            if ($temp_question->type === 'checkbox' || $temp_question->type === 'radio') {
                foreach ($q->values as $v) {
                    $vc = new \stdClass();
                    $vc->value = $v->value;
                    $temp_question->values[] = $vc;
                }
            }
            $temp[] = $temp_question;
        }
        $questionnaire_json->questions = $temp;
        return view('forms.show', [
            'questionnaire' => $questionnaire,
            'questionnaire_json' => json_encode($questionnaire_json)
        ]);
//        });
    }

    public function edit($id)
    {

            $questionnaire = Questionnaire::findOrFail($id);
            $questionnaire_json = new \stdClass();
            $questionnaire_json->name = $questionnaire->name;
            $questionnaire_json->description = $questionnaire->description;
            $questionnaire_json->questions = [];
            $temp = [];
            foreach ($questionnaire->questions as $q) {
                $temp_question = new \stdClass();
                $temp_question->question = $q->question;
                $temp_question->required = ($q->required === 1 ? true : false);
                $temp_question->type = $q->type;
                $temp_question->values = [];
                if ($temp_question->type === 'checkbox' || $temp_question->type === 'radio') {
                    foreach ($q->values as $v) {
                        $vc = new \stdClass();
                        $vc->value = $v->value;
                        $temp_question->values[] = $vc;
                    }
                }
                $temp[] = $temp_question;
            }
            $questionnaire_json->questions = $temp;
            return view('forms.edit', [
                'questionnaire' => $questionnaire,
                'questionnaire_json' => json_encode($questionnaire_json)
            ]);
    }

    public function update(Request $request, $id)
    {
        // TODO: Refactor, add validation
        DB::transaction(function () use ($id, $request) {

            // Json object passed by the view
            $questionnaire_object = json_decode($request->input('json-values'));
            // dd($questionnaire_object);
            $questionnaire = Questionnaire::findOrFail($id);
            $questionnaire->name = $questionnaire_object->name;
            $questionnaire->description = $questionnaire_object->description;
            $questionnaire->saveOrFail();
            foreach ($questionnaire->questions as $q) {
                $q->delete();
            }
            foreach ($questionnaire_object->questions as $q) {
                $new_question = new Question();
                $new_question->question = $q->question;
                $new_question->required = $q->required ? 1 : 0;
                $new_question->type = $q->type;
                $new_question->questionnaire_id = $questionnaire->id;
                $new_question->saveOrFail();
                // If type is checkbox/radio
                if ($q->type === 'radio' || $q->type === 'checkbox') {
                    // For each of the values
                    foreach ($q->values as $v) {
                        $new_val = new Value();
                        $new_val->value = $v->value;
                        $new_val->question_id = $new_question->id;
                        $new_val->saveOrFail();
                        $new_question->values()->save($new_val);
                    }
                }
                $questionnaire->questions()->save($new_question);
            }
            return redirect('/admin/forms');
        });
        return redirect('/admin/forms');
    }

    public function destroy($id)
    {
        $questions = Questionnaire::find($id)->questions;
        foreach ($questions as $question) {
            $values = $question->values;
            foreach ($values as $value) {
                $value->delete();
            }
            $question->delete();
        }
        Questionnaire::destroy($id);

        return redirect('/admin/forms');
    }


    function ordinances()
    {
        return view('forms.index', [
            'questionnaires' => Questionnaire::whereNotNull('ordinance_id')->get(),
            'flag' => FormsController::ORDINANCES
        ]);
    }

    function resolutions()
    {
        return view('forms.index', [
            'questionnaires' => Questionnaire::whereNotNull('resolution_id')->get(),
            'flag' => FormsController::RESOLUTIONS
        ]);
    }


}
