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

Route::prefix("series")->name("series.")->controller(SerieController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("/", "store")->name("store");
    Route::get("{serieId}", "show")->name("show");
    Route::post("{serieId}/update", "update")->name("update");
    Route::delete("{serieId}", "destroy")->name("destroy");
});

Route::prefix("serie-genres")->name("serie-genres.")->controller(SerieGenreController::class)->group(function () {
    Route::post("/", "store")->name("store");
    Route::delete("{serieGenreId}", "destroy")->name("destroy");
});

Route::prefix("serie-seasons")->name("serie-seasons.")->controller(SerieSeasonController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("/", "store")->name("store");
    Route::get("{serieSeasonId}", "show")->name("show");
    Route::post("{serieSeasonId}/update", "update")->name("update");
    Route::delete("{serieSeasonId}", "destroy")->name("destroy");
});

Route::prefix("persons")->name("persons.")->controller(PersonController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("/", "store")->name("store");
    Route::get("{personId}", "show")->name("show");
    Route::post("{personId}/update", "update")->name("update");
    Route::delete("{personId}", "destroy")->name("destroy");
});

Route::prefix("person-roles")->name("person-roles.")->controller(PersonRoleController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("/", "store")->name("store");
    Route::get("{personRoleId}", "show")->name("show");
    Route::post("{personRoleId}/update", "update")->name("update");
    Route::delete("{personRoleId}", "destroy")->name("destroy");
});

Route::prefix("person-has-roles")->name("person-has-roles.")->controller(PersonHasRoleController::class)->group(function () {
    Route::post("/", "store")->name("store");
    Route::delete("{personHasRoleId}", "destroy")->name("destroy");
});

Route::prefix("movie-persons")->name("movie-persons.")->controller(MoviePersonController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("/", "store")->name("store");
    Route::get("{moviePersonId}", "show")->name("show");
    Route::post("{moviePersonId}/update", "update")->name("update");
    Route::delete("{moviePersonId}", "destroy")->name("destroy");
});
