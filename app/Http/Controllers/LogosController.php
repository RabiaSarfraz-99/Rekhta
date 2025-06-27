<?php

namespace App\Http\Controllers;

use App\Models\Logos;
use Illuminate\Http\Request;

class LogosController extends Controller
{
    public function getdata() {
        $logoitem = Logos::get();
        return response()->json($logoitem);
    }
    public function index()
    {
        $logoitem = Logos::first()->paginate(10);
        return view('backend.logo.index', compact('logoitem'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.logo.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'string|max:255',

        ]);
        // Handle image upload

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/logo/'), $imageName);
            $validate['image'] = $imageName;
        }
        Logos::create($validate);
        return redirect()->route('logolist')->with('success', 'added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $logoitem = Logos::findOrFail($id);
        return view('backend.logo.viewlist', compact('logoitem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $logoitem = Logos::findOrFail($id);
        return view("backend.logo.add", compact("logoitem"));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'string|max:255',

        ]);
        $logoitem = Logos::findOrFail($id);
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/uploades/logo/' . $logoitem->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Save new image
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/logo'), $imageName);
            $validate['image'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validate['image'] = $logoitem->image;
        }
        $logoitem = Logos::findOrFail($id);
        $logoitem->update($validate);
        return redirect()->route('logolist')->with('success', 'updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $logoitem = Logos::find($id);
        if ($logoitem->image) {
            $image = public_path('asset/uploades/logo') . $logoitem->logo;
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $logoitem->delete();
        return redirect()->route('logolist')
            ->with('success', 'deleted successfully.');
    }
}
