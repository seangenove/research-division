<?php

namespace App\Http\Controllers\Admin;

use App\Ordinance;
use App\Questionnaire;
use App\StatusReport;
use App\UpdateReport;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\File;
use Mockery\Exception;

class OrdinancesController extends Controller
{
    const RR = 'RR';
    const ordinanceColumns = [
        'number',
        'series',
        'title',
        'keywords',
    ];

    public function getFileFromCloud($filename)
    {
        $dir = '/';
        $recursive = true; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

        // Check if file exists
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first();

        return $file;
    }

    public function upload($instance, $pdfFile, $directory)
    {
        /** Custom naming for files depending on what type:
         * (Ordinance, Resolution, Status Report, Update Report)
         */

        if (get_class($instance->ordinance) == 'App\\Ordinance') {
            $basedOn = 'Ordinance' . $instance->ordinance->number;
        } elseif (get_class($instance->resolution) == 'App\\Resolution') {
            $basedOn = 'Resolution' . $instance->resolution->number;
        }

        if ($directory === 'statusreports' or $directory === 'updatereports') {
            $filename =
                $instance->id .
                '-' .
                substr(get_class($instance), strrpos(get_class($instance), "\\") + 1) .
                '-' .
                $basedOn .
                '.pdf';
        } else {
            $filename = $instance->id .
                '-' .
                substr(get_class($instance), strrpos(get_class($instance), "\\") + 1) .
                $instance->number . '.pdf';
        }

        /**
         * File upload will depend on environment
         * local = local upload
         * production = Google Drive
         */

        if (env('APP_ENV') === 'local') {
            $pdfFile->storeAs(
                'public/' . $directory, $filename
            );

            $path = Storage::url($filename);
        } else {
            // Get file listing...
            $file = $this->getFileFromCloud($filename);

            // If file does exist, delete the existing file
            if ($file !== null and $directory !== 'updatereports') {
                Storage::disk('google')->delete($file['path']);
            }

            // save NEW FILE to Google Drive
            $path = $pdfFile->storeAs(
                env('GOOGLE_DRIVE_' . strtoupper($directory) . '_FOLDER_ID'),
                $filename,
                'google');
        }

        return $path;
    }

    public function validateData($request)
    {
        if ($request->has('is_accepting')) {
            $validatedData = $request->validate([
                'number' => 'required|numeric',
                'series' => 'required|numeric|digits:4',
                'title' => 'required|string',
                'keywords' => 'required|string',
                'is_monitoring' => '',
                'is_accepting' => '',
                'pdf' => '',
            ]);
        } else {
            $validatedData = $request->validate([
                'number' => 'required|numeric',
                'series' => 'required|numeric|digits:4',
                'title' => 'required|string',
                'keywords' => 'required|string',
                'is_monitoring' => '',
                'pdf' => '',
            ]);
        }
        return $validatedData;
    }

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
            $ordinances = Ordinance::where(function ($query) use ($q) {
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%');
            })->where(function ($query) {
                $query->where('is_monitoring', 0);
            });
        } else {
            $ordinances = Ordinance::where('is_monitoring', 0);
        }

        // Filtering by columns
        if ($request->has('col-number') || $request->has('col-series') || $request->has('col-title') || $request->has('col-keywords')) {
            $ordinances = $ordinances->where('number', 'LIKE', '%' . $request->input('col-number') . '%')
                ->where('keywords', 'LIKE', '%' . $request->input('col-keywords') . '%')
                ->where('series', 'LIKE', '%' . $request->input('col-series') . '%')
                ->where('title', 'LIKE', '%' . $request->input('col-title') . '%');
        }
        // Implement filtering / sorting
        $ordinances = $ordinances->orderBy($colName, $order);

        // Paginate with filters
        $ordinances = $ordinances->paginate($limit)->appends($request->all());

        return view('admin.ordinances.index', [
            'ordinances' => $ordinances,
            'type' => OrdinancesController::RR,
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if request has 'is_accepting'
        $validatedData = $this->validateData($request);

        $file = $request->file('pdf');

        $ordinance = new Ordinance();
        $ordinance->fill($validatedData);
        $ordinance->save();
        $ordinance->pdf_file_path =
            $request->has('pdf') ? $this->upload($ordinance, $file, 'ordinances') : '';
        $ordinance->pdf_file_name = $ordinance->pdf_file_path === "" ? "" :
            substr($ordinance->pdf_file_path, strrpos($ordinance->pdf_file_path, '/') + 1);
        $ordinance->save();

        Session::flash('flash_message', "Successfully added <strong> Ordinance" . $ordinance->number . "</strong>!");

        $redirectLink = $ordinance->is_monitoring == 1 ? '/admin/forms/ordinances' : '/admin/ordinances';

        return redirect($redirectLink);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordinance = Ordinance::findOrFail($id);
        $questionnaire = Questionnaire::where('ordinance_id', $id)->first();

        return view('admin.ordinances.show', [
            'ordinance' => $ordinance,
            'questionnaire' => $questionnaire,
            'flag' => FormsController::ORDINANCES
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordinance = Ordinance::findOrFail($id);

        return view('admin.ordinances.edit', [
            'ordinance' => $ordinance
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validateData($request);
        $file = $request->file('pdf');

        $ordinance = Ordinance::find($id);
        $ordinance->update($validatedData);
        $ordinance->pdf_file_path =
            $request->has('pdf') ? $this->upload($ordinance, $file, 'ordinances') : $ordinance->pdf_file_path;
        $ordinance->pdf_file_name = $ordinance->pdf_file_path === "" ? "" :
            substr($ordinance->pdf_file_path, strrpos($ordinance->pdf_file_path, '/') + 1);
        $ordinance->save();

        Session::flash('flash_message', "Successfully updated <strong>Ordinance " . $ordinance->number . "</strong>!");
        $redirectLink = $ordinance->is_monitoring == 1 ? '/admin/forms/ordinances' : '/admin/ordinances';

        return redirect($redirectLink);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ordinance::destroy($id);
        return redirect('/admin/ordinances');
    }

    public function statusReportCreate($ordinanceID)
    {
        $ordinance = Ordinance::findOrFail($ordinanceID);

        return view('admin.ordinances.uploadStatusReport', [
            'ordinance' => $ordinance,
        ]);

    }

    public function updateReportCreate($ordinanceID)
    {
        $ordinance = Ordinance::findOrFail($ordinanceID);

        return view('admin.ordinances.uploadUpdateReport', [
            'ordinance' => $ordinance,
        ]);
    }

    public function storeStatusReport(Request $request)
    {
        $validatedData = $request->validate([
            'ordinance_id' => '',
            'pdf' => 'required|file',
        ]);

        // Check if there is existing Status Report
        if (Ordinance::findOrFail($validatedData['ordinance_id'])->statusReport !== null) {
            $statusReport = Ordinance::findOrFail($validatedData['ordinance_id'])->statusReport;
        } else {
            $statusReport = new StatusReport();
        }

        $file = $request->file('pdf');

        // Store Status Report
        $statusReport->ordinance_id = $validatedData['ordinance_id'];
        $statusReport->save();
        $statusReport->pdf_file_path = $this->upload($statusReport, $file, 'statusreports');
        $statusReport->pdf_file_name = substr($statusReport->pdf_file_path,
            strrpos($statusReport->pdf_file_path, '/') + 1);
        $statusReport->save();

        Session::flash('flash_message',
            "Successfully uploaded status report for <strong> Ordinance " . $statusReport->ordinance->number . "</strong>!");

        return redirect('/admin/ordinances/' . $statusReport->ordinance_id);
    }

    public function storeUpdateReport(Request $request)
    {
        $validatedData = $request->validate([
            'ordinance_id' => '',
            'pdf' => 'required|file',
        ]);

        $file = $request->file('pdf');
        $updateReport = new UpdateReport();

        // Store Update Report
        $updateReport->ordinance_id = $validatedData['ordinance_id'];
        $updateReport->save();
        $updateReport->pdf_file_path = $this->upload($updateReport, $file, 'updatereports');
        $updateReport->pdf_file_name = substr($updateReport->pdf_file_path, strrpos($updateReport->pdf_file_path, '/') + 1);
        $updateReport->save();

        Session::flash('flash_message',
            "Successfully uploaded update report for<strong> Ordinance " . $updateReport->ordinance->number . "</strong>!");

        return redirect('/admin/ordinances/' . $updateReport->ordinance_id);
    }
}
