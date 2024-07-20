<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeSlot;

class TimeSlotSeeder extends Seeder
{
    public function run()
    {
        TimeSlot::create([
            'theater_name' => 'ABC movies',
            'start_time' => '2020-04-04 09:00:00',
            'end_time' => '2020-04-04 12:00:00',
            'title' => 'The Irishman',
            'duration' => '1 hour 20 minutes',
            'views' => '21.1k',
            'genre' => 'comedy',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMGUyM2ZiZmUtMWY0OC00NTQ4LThkOGUtNjY2NjkzMDJiMWMwXkEyXkFqcGdeQXVyMzY0MTE3NzU@._V1_FMjpg_UX1000_.jpg',
            'overall_rating' => 7.9,
            'theater_room_no' => 1,
            'description' => 'An aging hitman recalls his time with the mob and the intersecting events with his friend, Jimmy Hoffa, through the 1950-70s.'
        ]);
        // Add more seed data as needed...
    }
}
