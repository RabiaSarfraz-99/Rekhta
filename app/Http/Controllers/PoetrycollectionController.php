<?php

namespace App\Http\Controllers;

use App\Models\Poetrycollection;
use Illuminate\Http\Request;

class PoetrycollectionController extends Controller
{
    public function getdata()
    {
        $poetrycollection = Poetrycollection::orderBy('sequence')->orderByDesc('updated_at')->get();
        return response()->json($poetrycollection);
    }
    public function index()
    {
        $poetrycollection = Poetrycollection::latest()->paginate(10);
        return view('backend.poetrycollection.index', compact('poetrycollection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.poetrycollection.add');
    }

    public function store(Request $request)
    {
        // dd($request->all(), $request->file('image'));
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sequence' => 'integer',

        ]);



        // Handle image upload

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/poetrycollection'), $imageName);
            $validate['image'] = $imageName;
        }

        Poetrycollection::create($validate);
        return redirect()->route('poetrycollectionlisting')->with('success', 'Gallery added!');
    }


    public function show($id)
    {
        $poetrycollection = Poetrycollection::findOrFail($id);
        return view('backend.poetrycollection.view', compact('poetrycollection'));
    }


    public function edit($id)
    {
        $poetrycollection = Poetrycollection::findOrFail($id);
        return view('backend.poetrycollection.add', compact('poetrycollection'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'image' => 'image',
            'sequence' => 'integer',
        ]);

        $poetrycollection = Poetrycollection::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/uploades/poetrycollection/' . $poetrycollection->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Save new image
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/poetrycollection'), $imageName);
            $validate['image'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validate['image'] = $poetrycollection->image;
        }

        $poetrycollection->update($validate);

        return redirect()->route('poetrycollectionlisting')
            ->with('success', 'Rating updated successfully.');
    }
    public function destroy($id)
    {
        $poetrycollection = poetrycollection::find($id);
        if ($poetrycollection->image) {
            $image = public_path('asset/uploades/poetrycollection') . $poetrycollection->image;
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $poetrycollection->delete();
        return redirect()->route('poetrycollectionlisting')
            ->with('success', 'herolist deleted successfully.');
    }
}
