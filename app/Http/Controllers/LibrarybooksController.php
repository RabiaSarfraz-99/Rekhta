<?php

namespace App\Http\Controllers;

use App\Models\librarybooks;
use Illuminate\Http\Request;

class LibrarybooksController extends Controller
{
    public function getdata()
    {
        $librarybook = librarybooks::orderBy('sequence')->orderByDesc('updated_at')->get();
        return response()->json($librarybook);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $librarybook = librarybooks::first()->paginate(3);
        return view('backend.librarybook.index', compact('librarybook'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.librarybook.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validate = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'author' => 'required|string|max:255',
    //         'year' => 'integer|max:255',
    //         'catagory' => 'string|max:255',
    //         'image' => 'required|image',
    //         'link' => 'string|max:255',
    //         'sequence' => 'integer',
    //     ]);

    //     // Handle image upload

    //     if ($request->hasFile('image')) {
    //         $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
    //         $request->file('image')->move(public_path('assets/uploades/librarybook'), $imageName);
    //         $validate['image'] = $imageName;
    //     }
    //     dd($validate);
    //     librarybooks::create($validate);
    //     return redirect()->route('librarybooklisting')->with('success', 'added!');
    // }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'catagory' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|string|max:255',
            'sequence' => 'nullable|integer',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/librarybook'), $imageName);
            $validate['image'] = $imageName;
        }

        // Debug: See what is being saved


        librarybooks::create($validate);
        return redirect()->route('librarybooklisting')->with('success', 'added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $librarybook = librarybooks::findOrFail($id);
        return view('backend.librarybook.viewlist', compact('librarybook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $librarybook = librarybooks::findOrFail($id);
        return view("backend.librarybook.add", compact("librarybook"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'catagory' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|string|max:255',
            'sequence' => 'nullable|integer',
        ]);
        $librarybook = librarybooks::findOrFail($id);
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/uploades/librarybook/' . $librarybook->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Save new image
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/librarybook'), $imageName);
            $validate['image'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validate['image'] = $librarybook->image;
        }
        $librarybook = librarybooks::findOrFail($id);
        $librarybook->update($validate);
        return redirect()->route('librarybooklisting')->with('success', 'updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $librarybook = librarybooks::findOrFail($id);
        $librarybook->delete();
        return redirect()->route('librarybooklisting')->with('success', 'deleted successfully.');
    }
}
