<?php

namespace App\Http\Controllers;

use App\Models\learmoreslides;
use Illuminate\Http\Request;

class LearmoreslidesController extends Controller
{
    public function getdata(){
        $learnmore = learmoreslides::orderBy('sequence')->orderByDesc('updated_at')->get();
        return response()->json($learnmore);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $learnmore = learmoreslides::first()->paginate(10);
        return view('backend.learnmore.index', compact('learnmore'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.learnmore.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'sequence' => 'integer',
        ]);

        // Handle image upload

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/learnmore'), $imageName);
            $validate['image'] = $imageName;
        }

        learmoreslides::create($validate);
        return redirect()->route('learnmorelisting')->with('success', 'added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $learnmore = Learmoreslides::findOrFail($id);
        return view('backend.learnmore.viewlist', compact('learnmore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $learnmore = learmoreslides::findOrFail($id);
        return view("backend.learnmore.add", compact("learnmore"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'image' => 'required',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'sequence' => 'integer',
        ]);
        $learnmore = learmoreslides::findOrFail($id);
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/uploades/learnmore/' . $learnmore->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Save new image
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/learnmore'), $imageName);
            $validate['image'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validate['image'] = $learnmore->image;
        }
        $learnmore = learmoreslides::findOrFail($id);
        $learnmore->update($validate);
        return redirect()->route('learnmorelisting')->with('success', 'updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $learnmore = learmoreslides::findOrFail($id);
        $learnmore->delete();
        return redirect()->route('learnmorelisting')->with('success', 'deleted successfully.');
    }
}
