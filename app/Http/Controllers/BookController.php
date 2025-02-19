<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cover' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'publish_date' => 'required|date',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        // $image = $request->file('cover');
        // $image->storeAs('public/books', $image->hashName());
        $path = $request->file('cover')->store('books', 'public');

        Book::create([
            // 'cover' => $image->hashName(),
            'cover' => $path,
            'title' => $request->title,
            'description' => $request->description,
            'publish_date' => $request->publish_date,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect()->route('books.index')->with(['success' => 'Books Successfully Saved!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $books = Book::findOrFail($id);
        return view('books.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $books = Book::findOrFail($id);
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'cover' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'publish_date' => 'required|date',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $book = Book::findOrFail($id);

        if ($request->hasFile('cover')) {
            // $image = $request->file('cover');
            // $image->storeAs('public/books', $image->hashName());

            $path = $request->file('cover')->store('books', 'public');

            Storage::delete('public/books/' . $book->cover);

            $book->update([
                // 'cover' => $image->hashName(),
                'cover' => $path,
                'title' => $request->title,
                'description' => $request->description,
                'publish_date' => $request->publish_date,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        } else {
            $book->update([
                'title' => $request->title,
                'description' => $request->description,
                'publish_date' => $request->publish_date,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        }

        return redirect()->route('books.index')->with(['success' => 'Data Updated Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with(['success' => 'Data Deleted Successfully!']);
    }
}
