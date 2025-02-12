<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $authors = Author::latest()->paginate(10);
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'bio' => 'nullable|string',
            'birth_date' => 'required|date'
        ]);

        Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'birth_date' => $request->birth_date
        ]);

        return redirect()->route('authors.index')->with(['success' => 'Data Created Successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $authors = Author::findOrFail($id);
        return view('authors.show', compact('authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $authors = Author::findOrFail($id);
        return view('authors.edit', compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'bio' => 'nullable|string',
            'birth_date' => 'required|date'
        ]);

        $author = Author::findOrFail($id);

        $author->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'birth_date' => $request->birth_date
        ]);

        return redirect()->route('authors.index')->with(['success' => 'Data Updated Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index')->with(['success' => 'Data Deleted Successfully!']);
    }
}
