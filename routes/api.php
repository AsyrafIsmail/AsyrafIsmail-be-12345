<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TimeSlotController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('movies', MovieController::class);

Route::get('/movies', [MovieController::class, 'index']);
Route::post('/movies', [MovieController::class, 'store']);
Route::get('/movies/{movie}', [MovieController::class, 'show']);
Route::put('/movies/{movie}', [MovieController::class, 'update']);
Route::delete('/movies/{movie}', [MovieController::class, 'destroy']);

Route::get('/genre', [GenreController::class, 'getMoviesGenre']);
Route::get('/timeslots', [TimeSlotController::class, 'getTimeSlots']);
Route::get('/specific_movie_theater', [MovieController::class, 'getMoviesByTheaterAndDate']);
Route::get('/search_performer', [MovieController::class, 'searchPerformer']);
Route::post('/give_rating', [ReviewController::class, 'giveRating']);
Route::get('/new_movies', [MovieController::class, 'getNewMovies']);
Route::post('/add_movie', [MovieController::class, 'addMovie']);


