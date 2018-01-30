<?php

namespace App\Http\Controllers\Admin;

use App\Ordinance;
use App\Questionnaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\File;

class OrdinancesController extends Controller
{
    const IEC = 'IEC';

    public function upload($instance, $file, $type){
        $filename = $instance->id . substr(ucfirst($type),0, strlen($type)-1) . $instance->number . '.pdf';

        if (env('APP_ENV') === 'local'){
            $path = $file->storeAs(
                'public/'.$type, $filename
            );
        } else {
            // save to google drive
            $path = $file->storeAs(
                env('GOOGLE_DRIVE_'. strtoupper($type) .'_FOLDER_ID'),
                $filename,
                'google');
        }

        return $path;
    }

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
//        $path = $request->has('pdf') ? $this->upload($request, 'ordinances') : '';

        $file = $request->file('pdf');

        $ordinance = new Ordinance();
        $ordinance->fill($request->all());
        $ordinance->save();
        $ordinance->pdf_file_path = $request->has('pdf') ? $this->upload($ordinance, $file, 'ordinances') : '';
        $ordinance->save();

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
