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
// dd($id);
//$gen = Genre::findOrFail($id);
//dd($gen);

//$users = User::where('votes', '>', 100)->paginate(15);
    return new FilmCollection(Film::where('genres:id','=',$id)->paginate());
    // return new FilmCollection($gen->films()->paginate());

});

Route::get('/api/genres/', function () {

    return new GenreCollection(Genre::All());

});