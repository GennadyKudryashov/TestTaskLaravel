<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('genre', GenreController::class);
Route::resource('film', FilmController::class);
