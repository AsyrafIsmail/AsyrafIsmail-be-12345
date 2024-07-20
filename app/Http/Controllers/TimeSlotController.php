<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;

class TimeSlotController extends Controller
{
    public function getTimeSlots(Request $request)
    {
        // Validate the query parameters
        $request->validate([
            'theater_name' => 'required|string',
            'time_start' => 'required|date',
            'time_end' => 'required|date',
        ]);

        // Retrieve the query parameters
        $theater_name = $request->query('theater_name');
        $time_start = $request->query('time_start');
        $time_end = $request->query('time_end');

        // Fetch the time slots based on the parameters
        $timeSlots = TimeSlot::where('theater_name', $theater_name)
            ->whereBetween('start_time', [$time_start, $time_end])
            ->get();

        // Return the time slots as a JSON response
        return response()->json(['data' => $timeSlots], 200);
    }
}
