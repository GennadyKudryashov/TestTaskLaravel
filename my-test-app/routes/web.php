<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('genre', GenreController::class);
