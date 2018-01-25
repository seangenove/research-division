<?php

namespace App\Http\Controllers\Admin;

use App\Ordinance;
use App\Questionnaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OrdinancesController extends Controller
{
    const IEC = 'IEC';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = 25;
        $ordinances = Ordinance::where('is_monitoring', 0)->paginate($limit);

        // Implement search

        return view('admin.ordinances.index', [
            'ordinances' => $ordinances,
            'type' => OrdinancesController::IEC,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ordinances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if User uploaded a PDF

        if($request->has('pdf')){
            $filename = $request->number . '.pdf';
            $path = $request->file('pdf')->storeAs(
                env('GOOGLE_DRIVE_ORDINANCES_FOLDER_ID'),
                    $filename,
                    'google');
        }
//        dd($request->all());
        $ordinance = new Ordinance();
        $ordinance->fill($request->all());
        $ordinance->save();
//        dd($path);
        return redirect('/admin/ordinances');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $ordinance = Ordinance::findOrFail($id);

        return view('admin.ordinances.show', [
            'ordinance' => $ordinance,
            'questionnaires' => Questionnaire::whereNotNull('ordinance_id')->where('ordinance_id', $id)->get(),
            'flag' => FormsController::ORDINANCES
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordinance = Ordinance::findOrFail($id);

        return view('admin.ordinances.edit', [
            'ordinance' =>$ordinance
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Ordinance::find($id)->update($request->all());
        return redirect('/admin/ordinances');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ordinance::destroy($id);
        return redirect('/admin/ordinances');
    }
}
