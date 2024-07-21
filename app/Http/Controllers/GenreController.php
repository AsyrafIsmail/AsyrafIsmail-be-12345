<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class GenreController extends Controller
{
    // Retrieve all movies of a certain genre currently showing in theatres
    public function getMoviesGenre(Request $request) {

        // Save parameter 'genre' yang user masukkan semasa call API
        $genre = $request->query('genre');

        // Query untuk retrieve semua movies where genre sama dengan parameter yang user request
        $movies = Movie::where('genre', $genre)->get();

        // Return the retrieved movies dalam format JSON response dengan status code HTTP 200 
        return response()->json([
            'data' => $movies,
        ], 200);
    }
}
