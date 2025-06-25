<?php

namespace App\Http\Controllers;

use App\Models\Heroslider;
use Illuminate\Http\Request;

class HerosliderController extends Controller
{
    public function getdata()
    {
        $heroslider = Heroslider::orderBy('sequence')->orderByDesc('updated_at')->get();
        return response()->json($heroslider);
    }
    public function index()
    {
        $heroslider = Heroslider::latest()->paginate(10);
        return view('backend.heroslider.index', compact('heroslider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.heroslider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all(), $request->file('image'));
        $validate = $request->validate([
            'link' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sequence' => 'integer',

        ]);



        // Handle image upload

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/heroslider'), $imageName);
            $validate['image'] = $imageName;
        }

        Heroslider::create($validate);
        return redirect()->route('herolisting')->with('success', 'Gallery added!');
    }


    public function show($id)
    {
        $heroslider = Heroslider::findOrFail($id);
        return view('backend.heroslider.view', compact('heroslider'));
    }




    public function edit($id)
    {
        $heroslider = Heroslider::findOrFail($id);
        return view('backend.heroslider.add', compact('heroslider'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'link' => 'required|string|max:255',
            'image' => 'image',
            'sequence' => 'integer',
        ]);

        $heroslider = Heroslider::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/uploades/heroslider/' . $heroslider->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Save new image
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/heroslider'), $imageName);
            $validate['image'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validate['image'] = $heroslider->image;
        }

        $heroslider->update($validate);

        return redirect()->route('herolisting')
            ->with('success', 'Rating updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Heroslider $heroslider)
    // {
    //     $validate = $request->validate([
    //         'link' => 'required|string|max:255',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);
    //     $heroslider = Heroslider::findOrFail($heroslider);

    //     if ($request->hasFile('image')) {
    //         $oldImagePath = public_path('asset/uploades/' . $heroslider->image);
    //         if (file_exists($oldImagePath)) {
    //             unlink($oldImagePath);
    //         }
    //         // Save new image
    //         $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
    //         $request->file('image')->move(public_path('asset/uploades'), $imageName);
    //         $validate['image'] = $imageName;
    //     } else {
    //         // Keep the existing image if no new image is uploaded
    //         $validate['image'] = $heroslider->image;
    //     }

    //     $heroslider->update($validate);

    //     return redirect()->route('herolisting')
    //         ->with('success', 'Rating updated successfully.'); //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $heroslider = Heroslider::find($id);
        if ($heroslider->image) {
            $image = public_path('asset/uploades/heroslider') . $heroslider->image;
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $heroslider->delete();
        return redirect()->route('herolisting')
            ->with('success', 'herolist deleted successfully.');
    }
}
