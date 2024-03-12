<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Assuming you have a Book model

class BookController extends Controller
{
    // Other controller methods...

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image_link' => 'nullable|url',
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }
}