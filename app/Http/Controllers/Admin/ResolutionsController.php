<?php

namespace App\Http\Controllers\Admin;

use App\Questionnaire;
use App\Resolution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ResolutionsController extends Controller
{
    const RR = 'RR';
    const resolutionColumns = [
        'number',
        'series',
        'title',
        'keywords',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
                $query->where('is_monitoring', 0);
            });
        } else {
            $resolutions = Resolution::where('is_monitoring', 0);
        }

        // Implement filtering / sorting
        $resolutions = $resolutions->orderBy($colName, $order);

        // Paginate with filters
        $resolutions = $resolutions->paginate($limit)->appends($request->all());

        return view('admin.resolutions.index', [
            'resolutions' => $resolutions,
            'type' => ResolutionsController::RR,
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
        $validatedData = app('App\Http\Controllers\Admin\OrdinancesController')->validateData($request);
        $file = $request->file('pdf');

        $resolution = new Resolution();
        $resolution->fill($validatedData);
        $resolution->save();
        $resolution->pdf_file_path = $request->has('pdf') ?
            app('App\Http\Controllers\Admin\OrdinancesController')->upload($resolution, $file, 'resolutions')
            : '';
        $resolution->save();

        Session::flash('flash_message', "Successfully added <strong>Resolution" . $resolution->number . "</strong>!");
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
        $validatedData = app('App\Http\Controllers\Admin\OrdinancesController')->validateData($request);
        $file = $request->file('pdf');

        $resolution = Resolution::find($id);
        $resolution->update($validatedData);
        $resolution->pdf_file_path = $request->has('pdf') ? app('App\Http\Controllers\Admin\OrdinancesController')->upload($resolution, $file, 'resolutions') : $resolution->pdf_file_path;
        $resolution->save();

        Session::flash('flash_message', "Successfully updated <strong>Resolution" . $resolution->number . "</strong>!");
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
