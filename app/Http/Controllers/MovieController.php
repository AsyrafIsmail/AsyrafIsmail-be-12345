<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\TimeSlot;
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

    public function getMoviesByTheaterAndDate(Request $request)
    {
        $theaterName = $request->query('theater_name');
        $date = $request->query('d_date');

        // Validate the inputs
        $request->validate([
            'theater_name' => 'required|string',
            'd_date' => 'required|date_format:Y-m-d',
        ]);

        // Fetch movies based on the theater name and date
        $movies = TimeSlot::where('theater_name', $theaterName)
            ->whereDate('start_time', $date)
            ->get();

        return response()->json(['data' => $movies]);
    }

    public function searchPerformer(Request $request)
    {
        $performerName = $request->query('performer_name');

        $movies = Movie::where('performer_name', 'LIKE', '%' . $performerName . '%')->get();

        return response()->json(['data' => $movies], 200);
    }

    public function getNewMovies(Request $request)
    {
        $request->validate([
            'r_date' => 'required|date',
        ]);

        $r_date = $request->input('r_date');

        $movies = Movie::where('release_date', '<=', $r_date)
            ->orderBy('release_date', 'desc')
            ->get();

        return response()->json(['data' => $movies]);
    }

    public function addMovie(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'release_date' => 'required|date',
        'duration' => 'required|integer',
        'description' => 'required|string',
        'mpaa_rating' => 'required|string|max:10',
        'genre' => 'required|array',
        'genre.*' => 'string|max:50',
        'director' => 'required|string|max:255',
        'performer_name' => 'required|array',
        'performer_name.*' => 'string|max:255',
        'language' => 'required|string|max:50',
    ]);

    $movie = Movie::create([
        'title' => $validatedData['title'],
        'release_date' => $validatedData['release_date'],
        'duration' => $validatedData['duration'] . ' minutes',
        'description' => $validatedData['description'],
        'mpaa_rating' => $validatedData['mpaa_rating'],
        'genres' => implode(',', $validatedData['genre']),
        'director' => $validatedData['director'],
        'performers' => implode(',', $validatedData['performer_name']),
        'language' => $validatedData['language'],
    ]);

    return response()->json([
        'message' => "Successfully added movie {$movie->title} with Movie_ID {$movie->movie_id}",
        'success' => true
    ]);
}

}
