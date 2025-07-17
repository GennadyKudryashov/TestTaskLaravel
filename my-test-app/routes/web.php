<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Resources\FilmCollection;
use App\Http\Resources\GenreCollection;
use App\Models\Film;
use App\Models\Genre;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('genre', GenreController::class);
Route::resource('film', FilmController::class);

Route::get('/api/genres/{id}', function (string $id) {

$films = Film::join('genre_films', 'genre_films.film_id', '=', 'films.id') -> where( 'genre_films.genre_id' , '=', $id);

    return new FilmCollection(
       $films->paginate(5)
        
    );
   
});

Route::get('/api/films/', function () {

    return new FilmCollection(Film::paginate());

});

Route::get('/api/films/{id}', function (string $id) {
// dd($id);
    $film = Film::find($id)->first();
        return new FilmCollection(
           [$film]
            
        );
       
    });
    