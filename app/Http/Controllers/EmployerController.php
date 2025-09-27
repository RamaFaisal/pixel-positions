<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class EmployerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $employer = optional($user)->employer;
        $jobs = optional($employer)->jobs;

        return view('employers.index', [
            'employer' => $employer,
            'job' => $jobs
        ]);
    }

    public function create()
    {
        return view('employers.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'employer' => 'required|string|max:255',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $logoFile = $request->file('logo');
        $logoName = $logoFile->hashName();
        $logoFile->storeAs('logo', $logoName, 'public');

        Employer::create([
            'user_id' => $user->id,
            'name' => $validated['employer'],
            'logo' => $logoName
        ]);

        return redirect()->route('employer.index')->with('success', 'Employer created successfully!');
    }
}
