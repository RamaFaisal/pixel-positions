<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $jobs = Job::all()->groupBy('featured');
        $jobs = Job::latest()->get();
        $featuredJobs = $jobs->where('featured', true);
        $regularJobs = $jobs->where('featured', false);
        $recentJobs = Job::latest()->paginate(5);

        $query = $request['search'];

        $hasil = Job::where('title', 'like', '%' . $query . '%')
            ->get();

        return view('jobs.index', [
            'featuredJobs' => $featuredJobs,
            'regularJobs' => $regularJobs,
            'jobs' => $jobs,
            'tags' => Tag::all(),
            'hasil' => $hasil,
            'recentJobs' => $recentJobs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create', [
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|min:5',
            'salary' => 'required|max:255',
            'tags' => 'nullable|array|min:1',
            'tags.*' => 'string|max:255',
            'location' => 'required|max:255',
            'schedule' => 'required|max:255',
            'url' => 'required|url|max:255',
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('gambar', $gambar->hashName(), 'public');

        $featuredReq = false;
        if ($request->input('schedule') !== 'Full-time') {
            $featuredReq = true;
        }

        $user = auth()->user();

        if ($user && $user->employer) {
            $employerId = $user->employer->id;
        } else {
            return redirect()->back()->withErrors(['message' => 'Anda harus memiliki profil perusahaan untuk posting pekerjaan.']);
        }

        $job = Job::create([
            'employer_id' => $employerId,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'gambar' => $gambar->hashName(),
            'description' => request('description'),
            'salary' => request('salary'),
            'location' => request('location'),
            'schedule' => request('schedule'),
            'url' => request('url'),
            'featured' => $featuredReq,
        ]);

        if ($request->filled('tags')) {
            $tagIds = collect($request->input('tags'))->map(function ($tagName) {
                $tagName = trim(strtolower($tagName));
                if (empty($tagName)) {
                    return null;
                }
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                return $tag->id;
            })->filter()->unique();
            
            $job->tags()->sync($tagIds);
        } else {
            $job->tags()->detach();
        }

        return redirect('/')->with('success', 'Job posted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $tagIds = $job->tags->pluck('id');

        $relatedJobs = Job::whereHas('tags', function ($query) use ($tagIds) {
            $query->whereIn('tags.id', $tagIds);
        })
            ->where('id', '!=', $job->id)
            ->latest()
            ->paginate(3);

        return view('jobs.show', [
            'job' => $job,
            'relatedJobs' => $relatedJobs,
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
