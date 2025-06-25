<?php

namespace App\Http\Controllers;

use App\Models\Shayaricollection;
use Illuminate\Http\Request;

class ShayaricollectionController extends Controller
{
    public function getdata()
    {
        $shayaricollection = Shayaricollection::orderBy('sequence')->orderByDesc('updated_at')->get();
        return response()->json($shayaricollection);
    }
    public function index()
    {
        $shayaricollection = Shayaricollection::latest()->paginate(10);
        return view('backend.shayaricollection.index', compact('shayaricollection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.shayaricollection.add');
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
            $request->file('image')->move(public_path('assets/uploades/shayaricollection'), $imageName);
            $validate['image'] = $imageName;
        }

        Shayaricollection::create($validate);
        return redirect()->route('shayaricollectionlisting')->with('success', 'Gallery added!');
    }



    public function show($id)
    {
        $shayaricollection = Shayaricollection::findOrFail($id);
        return view('backend.shayaricollection.view', compact('shayaricollection'));
    }


    public function edit($id)
    {
        $shayaricollection = Shayaricollection::findOrFail($id);
        return view('backend.shayaricollection.add', compact('shayaricollection'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'image' => 'image',
            'sequence' => 'integer',
        ]);

        $shayaricollection = Shayaricollection::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/uploades/shayaricollection/' . $shayaricollection->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Save new image
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/shayaricollection'), $imageName);
            $validate['image'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validate['image'] = $shayaricollection->image;
        }

        $shayaricollection->update($validate);

        return redirect()->route('shayaricollectionlisting')
            ->with('success', 'Rating updated successfully.');
    }
    public function destroy($id)
    {
        $shayaricollection = shayaricollection::find($id);
        if ($shayaricollection->image) {
            $image = public_path('asset/uploades/shayaricollection') . $shayaricollection->image;
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $shayaricollection->delete();
        return redirect()->route('shayaricollectionlisting')
            ->with('success', 'herolist deleted successfully.');
    }
}
