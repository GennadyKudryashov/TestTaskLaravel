<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
// use App\Models\Note;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\GenreStoreRequest;
use App\Http\Requests\GenreUpdateRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       // $genre = Genre

        $genres = Genre::latest()->paginate(5);
          
        return view('genre.index', compact('genres'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  // public function store(Request $request)
    public function store(GenreStoreRequest $request): RedirectResponse
    {
        //
        Genre::create($request->validated());
           
        return redirect()->route('genre.index')
                         ->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
   // public function update(Request $request, Genre $genre)
    public function update(GenreUpdateRequest $request, Genre $genre): RedirectResponse
   
    {
        //
        var_dump($genre); 
        var_dump($request);
        die;
        $genre->update($request->validated());

       // var_dump($genre); die;
          
        return redirect()->route('genre.index')
                        ->with('success', 'Genre updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
        $genre->delete();
           
        return redirect()->route('genre.index')
                        ->with('success', 'Note deleted successfully');
    }
}
