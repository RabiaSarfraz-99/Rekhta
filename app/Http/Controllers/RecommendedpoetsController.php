<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recommendedpoets;

class RecommendedpoetsController extends Controller
{
    public function getdata()
    {
        $recommendedpoets = Recommendedpoets::orderBy('sequence')->orderByDesc('updated_at')->get();
        return response()->json($recommendedpoets);
    }
    public function index()
    {
        $recommendedpoets = Recommendedpoets::latest()->paginate(10);
        return view('backend.recommendedpoets.index', compact('recommendedpoets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.recommendedpoets.add');
    }

    public function store(Request $request)
    {
        // dd($request->all(), $request->file('image'));
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sequence' => 'integer',

        ]);



        // Handle image upload

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/recommendedpoets'), $imageName);
            $validate['image'] = $imageName;
        }

        Recommendedpoets::create($validate);
        return redirect()->route('recommendedpoetslisting')->with('success', 'Gallery added!');
    }


    public function show($id)
    {
   
        $recommendedpoets = Recommendedpoets::findOrFail($id);
        return view('backend.recommendedpoets.view', compact('recommendedpoets'));
    }



    public function edit($id)
    {
        $recommendedpoets = Recommendedpoets::findOrFail($id);
        return view('backend.recommendedpoets.add', compact('recommendedpoets'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'image' => 'image',
            'sequence' => 'integer',
        ]);

        $recommendedpoets = Recommendedpoets::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/uploades/recommendedpoets/' . $recommendedpoets->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Save new image
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/recommendedpoets'), $imageName);
            $validate['image'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validate['image'] = $recommendedpoets->image;
        }

        $recommendedpoets->update($validate);

        return redirect()->route('recommendedpoetslisting')
            ->with('success', 'Rating updated successfully.');
    }
    public function destroy($id)
    {
        $recommendedpoets = recommendedpoets::find($id);
        if ($recommendedpoets->image) {
            $image = public_path('asset/uploades/recommendedpoets') . $recommendedpoets->image;
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $recommendedpoets->delete();
        return redirect()->route('recommendedpoetslisting')
            ->with('success', 'herolist deleted successfully.');
    }
}
