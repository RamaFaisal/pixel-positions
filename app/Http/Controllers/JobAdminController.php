<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JobAdminController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(10);

        return view('admin.jobs.job-admin', [
            'jobs' => $jobs,
        ]);
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit-job', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|max:255|unique:jobs,title,' . $job->id,
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'salary' => 'required',
            'description' => 'required',
            'location' => 'required',
            'schedule' => 'required',
            'url' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            if ($job->gambar) {
                Storage::disk('public')->delete($job->gambar);
            }
            $gambar = $file->storeAs('gambar', $file->hashName(), 'public');
        } else {
            $gambar = $job->gambar;
        }

        if ($request->input('schedule') !== 'Full-time') {
            $job->update([
                'featured' => true,
            ]);
        }

        $job->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'gambar' => $gambar,
            'salary' => $request->salary,
            'description' => $request->description,
            'location' => $request->location,
            'schedule' => $request->schedule,
            'url' => $request->url,
        ]);

        return redirect()->route('admin.jobs')->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        if ($job->gambar) {
            Storage::disk('public')->delete($job->gambar);
        }
        return redirect()->route('admin.jobs')->with('success', 'Job deleted successfully!');
    }
}
