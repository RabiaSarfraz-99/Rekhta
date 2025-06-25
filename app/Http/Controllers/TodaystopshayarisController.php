<?php

namespace App\Http\Controllers;

use App\Models\Todaystopshayaris;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValue;

class TodaystopshayarisController extends Controller
{

    public function getdata(){
        $topshayari = Todaystopshayaris::orderBy('sequence')->orderByDesc('updated_at')->get();
        return response()->json($topshayari);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topshayari = Todaystopshayaris::first()->paginate(10);
        return view('backend.todaystopshayari.index' , compact('topshayari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.todaystopshayari.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'shayari' => 'required|string',
            'poet' => 'required|string',
            'link' => 'required|string',
            'sequence' => 'integer',
        ]);
        
        Todaystopshayaris::create($validate);
        return redirect()->route('topshayarilisting')->with('success', 'Todaystopshayari added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $topshayari = Todaystopshayaris::findOrFail($id);
        return view('backend.todaystopshayari.viewlist', compact('topshayari'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $topshayari = Todaystopshayaris::findOrFail($id);
        return view('backend.todaystopshayari.add', compact('topshayari'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $validate = $request->validate([
            'shayari' => 'required|string',
            'poet' => 'required|string',
            'link' => 'required|string',
            'sequence' => 'integer',
        ]);
        $topshayari = Todaystopshayaris::findOrFail($id);
        $topshayari->update($validate);

      return redirect()->route('topshayarilisting')
            ->with('success', 'Rating updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $topshayari = Todaystopshayaris::findOrFail($id);
        $topshayari->delete();
        return redirect()->route('topshayarilisting')->with('success', 'deleted successfully.');

    }
}
