<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedVideo;

class FeaturedVideoController extends Controller
{
    public function index()
    {
        $video = FeaturedVideo::latest()->first();
        return view('video-section', compact('video'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'youtube_url' => 'required|url',
        ]);

        FeaturedVideo::create($request->all());
        return redirect()->route('featured-videos.index')->with('success', 'Video added!');
    }

    public function edit(FeaturedVideo $featuredVideo)
    {
        return view('admin.videos.edit', compact('featuredVideo'));
    }

    public function update(Request $request, FeaturedVideo $featuredVideo)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'youtube_url' => 'required|url',
        ]);

        $featuredVideo->update($request->all());
        return redirect()->route('featured-videos.index')->with('success', 'Video updated!');
    }

    public function destroy(FeaturedVideo $featuredVideo)
    {
        $featuredVideo->delete();
        return redirect()->route('featured-videos.index')->with('success', 'Video deleted!');
    }
}


