<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function giveRating(Request $request)
    {
        $request->validate([
            'movie_title' => 'required|string',
            'username' => 'required|string',
            'rating' => 'required|integer|between:1,10',
            'r_description' => 'required|string'
        ]);

        $review = new Review();
        $review->movie_title = $request->input('movie_title');
        $review->username = $request->input('username');
        $review->rating = $request->input('rating');
        $review->r_description = $request->input('r_description');
        $review->save();

        return response()->json([
            'message' => "Successfully added review for {$review->movie_title} by user: {$review->username}",
            'success' => true
        ]);
    }
}
