<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $tagList = Tag::all();
        $jobs = $tag->jobs()->latest()->paginate(6);

        return view('tags.index', [
            'tags' => $tag,
            'tagList' => $tagList,
            'jobs' => $jobs
        ]);
    }
}
