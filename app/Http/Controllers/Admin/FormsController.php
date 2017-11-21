<?php

namespace App\Http\Controllers\Admin;

use App\Questionnaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormsController extends Controller
{

    /**
     * Index page for Forms - Listing of all available forms
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('forms.index');
    }

    public function create(){
        return view('forms.create');
    }
    public function store(Request $request)
    {
        $questionnaire_object = json_decode($request->input('json-values'));
        dd($questionnaire_object);
        
//        $questionnaire = new Questionnaire();
//        $questionnaire->fill($request->all());
//        $questionnaire->save();

        return redirect('/admin/forms');
    }
    public function show($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        return view('admin.forms.show', [
            'questionnaire' => $questionnaire
        ]);
    }
    public function edit(){
        return view('forms.edit');
    }

}
