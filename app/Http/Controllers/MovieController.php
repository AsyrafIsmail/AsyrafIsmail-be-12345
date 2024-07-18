<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|integer',
            'director' => 'required',
        ]);

        return Movie::create($request->all());
    }

    public function show(Movie $movie)
    {
        return $movie;
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|integer',
            'director' => 'required',
        ]);

        $movie->update($request->all());

        return $movie;
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return response()->noContent();
    }
}

