<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    // Get all movies
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies, Response::HTTP_OK);
    }

    // Create a new movie
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
        ]);

        $movie = Movie::create($request->all());

        return response()->json($movie, Response::HTTP_CREATED);
    }

    // Get a single movie
    public function show(Movie $movie)
    {
        return response()->json($movie, Response::HTTP_OK);
    }

    // Update an existing movie
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
        ]);

        $movie->update($request->all());

        return response()->json($movie, Response::HTTP_OK);
    }

    // Delete a movie
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return response()->noContent();
    }
}
