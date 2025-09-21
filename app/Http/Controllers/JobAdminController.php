<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobAdminController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(10);

        return view('admin.jobs.job-admin', [
            'jobs' => $jobs,
        ]);
    }
}
