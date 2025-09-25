<?php

namespace App\Http\Controllers;

use App\Exports\JobExport;
use App\Models\Job;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PrintController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return view('admin.pdf.index', ['jobs' => $jobs]);
    }

    public function generatePDF()
    {

        $jobs = Job::latest()->get();

        $pdf = Pdf::loadView('admin.pdf.pdf-page', ['jobs' => $jobs]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('download.pdf');
    }

    public function generateExcel()
    {
        // return view('admin.pdf.excel-page', [
        //     'jobs' => Job::all()
        // ]);
        return Excel::download(new JobExport, 'jobs.xlsx');
    }
}
