<?php

namespace App\Http\Controllers;

use App\Models\Navbaritems;
use Illuminate\Http\Request;

class NavbaritemsController extends Controller
{
    public function getdata()
    {
    $navitem = Navbaritems::get();
        return response()->json($navitem);
    }
    public function index()
    {
        $navbaritem = Navbaritems::first()->paginate(10);
        return view('backend.navbar.index', compact('navbaritem'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.navbar.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'navitem' => 'string|max:255',
            'link' => 'string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sequence' => 'integer',

        ]);



        // Handle image upload

        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('assets/uploades/logo/'), $imageName);
            $validate['logo'] = $imageName;
        }

        Navbaritems::create($validate);
        return redirect()->route('navbarlist')->with('success', 'added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $navbaritem = Navbaritems::findOrFail($id);
        return view('backend.navbar.viewlist', compact('navbaritem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $navbaritem = Navbaritems::findOrFail($id);
        return view("backend.navbar.add", compact("navbaritem"));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $validate = $request->validate([
            'navitem' => 'string|max:255',
            'link' => 'string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sequence' => 'integer',

        ]);
        $navbaritem = Navbaritems::findOrFail($id);
        if ($request->hasFile('logo')) {
            $oldImagePath = public_path('assets/uploades/logo/' . $navbaritem->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Save new image
            $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('assets/uploades/logo'), $imageName);
            $validate['logo'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validate['logo'] = $navbaritem->logo;
        }
        $navbaritem = Navbaritems::findOrFail($id);
        $navbaritem->update($validate);
        return redirect()->route('navbarlist')->with('success', 'updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $navbaritem = Navbaritems::find($id);
        if ($navbaritem->logo) {
            $image = public_path('asset/uploades/logo') . $navbaritem->logo;
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $navbaritem->delete();
        return redirect()->route('navbarlist')
            ->with('success', 'deleted successfully.');
    }
}
