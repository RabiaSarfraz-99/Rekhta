<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function getdata()
    {
        $books = Book::orderBy('sequence')->orderByDesc('updated_at')->get();
        return response()->json($books);
    }
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('backend.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.books.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'integer',
            'sequence' => 'integer',

        ]);

      

        // Handle image upload

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/books'), $imageName);
            $validate['image'] = $imageName;
        }

        Book::create($validate);
        return redirect()->route('bookslisting')->with('success', 'Gallery added!');
    }


    public function show($id)
    {
         $books = Book::findOrFail($id);
        return view('backend.books.view', compact('books'));
    }



    public function edit($id)
    {
        $books = Book::findOrFail($id);
        return view('backend.books.add', compact('books'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'integer',
            'sequence' => 'integer',
        ]);

        $books = Book::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/uploades/books/' . $books->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Save new image
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploades/books'), $imageName);
            $validate['image'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validate['image'] = $books->image;
        }

        $books->update($validate);

        return redirect()->route('bookslisting')
            ->with('success', 'Rating updated successfully.');
    }
    public function destroy($id)
    {
        $books = Book::find($id);
        if ($books->image) {
            $image = public_path('asset/uploades/books') . $books->image;
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $books->delete();
        return redirect()->route('bookslisting')
            ->with('success', 'herolist deleted successfully.');
    }
}
