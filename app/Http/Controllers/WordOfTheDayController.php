<?php

namespace App\Http\Controllers;

use App\Models\WordOfTheDay;
use Illuminate\Http\Request;

class WordOfTheDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wordoftheday = WordOfTheDay::first()->paginate(10);
        return view('backend.wordoftheday.index' , compact('topshayari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.wordoftheday.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'engword' => 'required|string',
            'hinword' => 'required|string',
            'urdword' => 'required|string',
            'meaning' => 'required|string',
            'sher' => 'required|string',
            'poet' => 'required|string',
            'link' => 'required|string',
            'meaning' => 'required|string',
        ]);
       
        WordOfTheDay::create($validate);
        return redirect()->route('wordlist')->with('success', ' added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WordOfTheDay $wordOfTheDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WordOfTheDay $wordOfTheDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WordOfTheDay $wordOfTheDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WordOfTheDay $wordOfTheDay)
    {
        //
    }
}
