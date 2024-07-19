<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class GenreController extends Controller
{
    public function getMoviesByGenre(Request $request) {
        $genre = $request->query('genre');

        // Retrieve movies by genre
        $movies = Movie::where('genre', $genre)->get();

        return response()->json([
            'data' => $movies,
        ], 200);
    }
}
