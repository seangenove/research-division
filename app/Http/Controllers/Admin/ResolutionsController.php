<?php

namespace App\Http\Controllers\Admin;

use App\Questionnaire;
use App\Resolution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResolutionsController extends Controller
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
        $resolutions = Resolution::where('is_monitoring', 0)->paginate($limit);

        // Implement search

        return view('admin.resolutions.index', [
            'resolutions' => $resolutions,
            'type' => ResolutionsController::IEC,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resolutions.create');
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

//        if($request->has('pdf')){
//            $filename = $request->number . '.pdf';
//            $request->file('pdf')->storeAs(
//                env('GOOGLE_DRIVE_RESOLUTIONS_FOLDER_ID'),
//                $filename,
//                'google');
//        }
//
//        if ($request->has('pdf')) {
//            $filename = $request->id . 'Ordinance' . $request->number . '.pdf';
//
//            if (env('APP_ENV') === 'local'){
//                $path = $request->file('pdf')->storeAs(
//                    'public/ordinances', $filename
//                );
//            } else {
//                // save to google drive
//                $path = $request->file('pdf')->storeAs(
//                    env('GOOGLE_DRIVE_ORDINANCES_FOLDER_ID'),
//                    $filename,
//                    'google');
//            }
//        }

        $file = $request->file('pdf');

        $resolution = new Resolution();
        $resolution->fill($request->all());
        $resolution->save();
        $resolution->pdf_file_path = $request->has('pdf') ?
            app('App\Http\Controllers\Admin\OrdinancesController')->upload($resolution, $file, 'resolutions')
            : '';
        $resolution->save();

        return redirect('/admin/resolutions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resolution = Resolution::findOrFail($id);
        $questionnaire = Questionnaire::where('resolution_id', $id)->first();

        return view('admin.resolutions.show', [
            'resolution' => $resolution,
            'questionnaire' => $questionnaire,
            'flag' => FormsController::RESOLUTIONS,
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
        $resolution = Resolution::findOrFail($id);

        return view('admin.resolutions.edit', [
            'resolution' =>$resolution
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
        Resolution::find($id)->update($request->all());
        return redirect('/admin/resolutions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resolution::destroy($id);
        return redirect('/admin/resolutions');
    }
}
