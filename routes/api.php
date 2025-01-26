<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("genres")->name("genres.")->controller(GenreController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("/", "store")->name("store");
    Route::get("{genreId}", "show")->name("show");
    Route::post("{genreId}/update", "update")->name("update");
    Route::delete("{genreId}", "destroy")->name("destroy");
});

Route::prefix("movies")->name("movies.")->controller(MovieController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("/", "store")->name("store");
    Route::get("{movieId}", "show")->name("show");
    Route::post("{movieId}/update", "update")->name("update");
    Route::delete("{movieId}", "destroy")->name("destroy");
});

Route::prefix("movie-genres")->name("movie-genres.")->controller(MovieGenreController::class)->group(function () {
    Route::post("/", "store")->name("store");
    Route::delete("{movieGenreId}", "destroy")->name("destroy");
});
