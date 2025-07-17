<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $films = Film::latest()->paginate(5);
          
        return view('films.index', compact('films'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   // public function store(Request $request)
    public function store(FilmStoreRequest $request): RedirectResponse
    {
        //
        //$rec = $request->all();
        //var_dump($rec);die;
        Film::create($request->validated());
           
        return redirect()->route('film.index')
                         ->with('success', 'Film created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
        //$genre = $film->genres();
        //var_dump($genre);die;
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        //
        return view('films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, Film $film)
    public function update(FilmUpdateRequest $request, Film $film): RedirectResponse
   
    {
        //

       // $film->update($request->validated());

        $ids_list = $request->input('genres');//->toArray();
        $ids = explode(',', $ids_list);
        //dd($ids);
        foreach( $ids as $id){

            $film->genres()->attach($id);
        }


        $film->save();

       // var_dump($genre); die;
          
        return redirect()->route('film.index')
                        ->with('success', 'Film updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        //
        $film->delete();
           
        return redirect()->route('film.index')
                        ->with('success', 'Film deleted successfully');
    }
}
