<?php

namespace App\Http\Controllers;

use App\Models\rc;
use App\Models\Book;
use App\Models\librarybooks;
use Illuminate\Http\Request;
use App\Models\Poetrycollection;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        $books = Book::query();
        $librarybooks = librarybooks::query();
        $poetrycollections = Poetrycollection::query();

        if ($query) {
            // $books = $books->where('title', 'like', "%{$query}%")->orWhere('author', 'like', "%{$query}%")->get();
            $books = $books
                ->where(function ($q) use ($query) {
                    $q->where('title',  'like', "%{$query}%")
                        ->orWhere('author', 'like', "%{$query}%");
                })
                ->get();
            $librarybooks = $librarybooks->where('title', 'like', "%{$query}%")->get();
            $poetrycollections = $poetrycollections->where('title', 'like', "%{$query}%")->get();
        } else {
            $books = collect(); // Empty collections when no query
            $librarybooks = collect();
            $poetrycollections = collect();
        }

       
        return view('search.results', compact('query', 'books', 'librarybooks', 'poetrycollections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(rc $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rc $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rc $rc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rc $rc)
    {
        //
    }
}
