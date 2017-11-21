<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Questionnaire;
use App\Value;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormsController extends Controller
{

    /**
     * Index page for Forms - Listing of all available forms
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('forms.index', [
            'questionnaires' => Questionnaire::all()
        ]);
    }

    public function create()
    {
        return view('forms.create');
    }

    public function store(Request $request)
    {
        $questionnaire_object = json_decode($request->input('json-values'));
//        dd($questionnaire_object);
        $questionnaire = new Questionnaire();
        $questionnaire->name = $questionnaire_object->name;
        $questionnaire->description = $questionnaire_object->description;
        $questionnaire->saveOrFail();
        foreach ($questionnaire_object->questions as $q) {
            $new_question = new Question();
            $new_question->question = $q->question;
            $new_question->required = $q->required ? 1 : 0;
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

        // commit to db

        dd($questionnaire);

//        $questionnaire = new Questionnaire();
//        $questionnaire->fill($request->all());
//        $questionnaire->save();

        return redirect('/admin/forms');
    }

    public
    function show($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        return view('admin.forms.show', [
            'questionnaire' => $questionnaire
        ]);
    }

    public function edit()
    {
        return view('forms.edit');
    }

}
