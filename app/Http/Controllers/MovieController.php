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
        // Fetch semua data dari table movies
        $movies = Movie::all();

        // Return response JSON dengan status 200 (OK)
        return response()->json($movies, Response::HTTP_OK);
    }

    // Create a new movie
    public function store(Request $request)
    {
        // Validate input request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
        ]);

        // Create movie baru based on request
        $movie = Movie::create($request->all());

        return response()->json($movie, Response::HTTP_CREATED);
    }

    // Get a single movie based on movie_id as parameter
    public function show(Movie $movie)
    {
        return response()->json($movie, Response::HTTP_OK);
    }

    // Update an existing movie
    public function update(Request $request, Movie $movie)
    {
        // Validate the request parameters
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'release_date' => 'sometimes|required|date',
            'duration' => 'sometimes|required|integer',
            'description' => 'sometimes|required|string',
            'mpaa_rating' => 'sometimes|required|string|max:10',
            'genres' => 'sometimes|required|string',
            'director' => 'sometimes|required|string|max:255',
            'performers' => 'sometimes|required|string',
            'language' => 'sometimes|required|string|max:50',
        ]);

        // Update the movie with the validated data
        $movie->update($request->all());

        // Return the updated movie data as JSON
        return response()->json($movie, Response::HTTP_OK);
    }

    // Delete a movie
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->noContent();
    }

    // Get movie data showing on a certain date at a specific theatre
    public function getMoviesByTheaterAndDate(Request $request)
    {
        // Save parameter theater_name and d_date dari user request
        $theaterName = $request->query('theater_name');
        $date = $request->query('d_date');

        // Validate the inputs
        $request->validate([
            'theater_name' => 'required|string',
            'd_date' => 'required|date_format:Y-m-d',
        ]);

        // Fetch movies based on parameter theater name and date
        $movies = TimeSlot::where('theater_name', $theaterName)
            ->whereDate('start_time', $date)
            ->get();

        return response()->json(['data' => $movies]);
    }

    // Fetch movie record guna nama pelakon
    public function searchPerformer(Request $request)
    {
        // Save performer's name from request's parameter
        $performerName = $request->query('performer_name');

        // Query to fetch data based on performer's name
        $movies = Movie::where('performer_name', 'LIKE', '%' . $performerName . '%')->get();

        return response()->json(['data' => $movies], 200);
    }

    // Function to get movies using released date
    public function getNewMovies(Request $request)
    {

        // Validate
        $request->validate([
            'r_date' => 'required|date',
        ]);

        // Save data dari parameter
        $r_date = $request->input('r_date');

        // Query to fetch data guna parameter order by newest to oldest
        $movies = Movie::where('release_date', '<=', $r_date)
            ->orderBy('release_date', 'desc')
            ->get();

        return response()->json(['data' => $movies]);
    }

    // Function to add new movie
    public function addMovie(Request $request)
{
    // Validate parameters
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

    // Add new movie using validated data
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
