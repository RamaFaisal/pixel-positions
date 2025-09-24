<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return view('admin.pdf.index', ['jobs' => $jobs]);
    }

    public function generatePDF() {

        $jobs = Job::all();

        $pdf = Pdf::loadView('admin.pdf.pdf-page', ['jobs' => $jobs]);

        return $pdf->stream('download.pdf');
    }
}
