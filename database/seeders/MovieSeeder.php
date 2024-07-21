<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    public function run()
    {
        DB::table('movies')->insert([
            [
                'title' => 'Parasite',
                'genre' => 'comedy',
                'duration' => '1 hour 20 minutes',
                'views' => '21.1k',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BYWZjMjk3ZTItODQ2ZC00NTY5LWE0ZDYtZTI3MjcwN2Q5NTVkXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg',
                'overall_rating' => 7.2,
                'description' => 'A poor family, the Kims, con their way into becoming the servants of a rich family, the Parks. But their easy life gets complicated when their deception is threatened with exposure.',
                'performer_name' => 'Al Pacino',
                'release_date' => '2019-05-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Favourite',
                'genre' => 'comedy',
                'duration' => '1 hour 20 minutes',
                'views' => '21.1k',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMTg1NzQwMDQxNV5BMl5BanBnXkFtZTgwNDg2NDYyNjM@._V1_.jpg',
                'overall_rating' => 7,
                'description' => 'In early 18th century England, a frail Queen Anne occupies the throne and her close friend, Lady Sarah, governs the country in her stead. When a new servant, Abigail, arrives, her charm endears her to Sarah.',
                'performer_name' => 'Robert Downey Junior',
                'release_date' => '2018-11-23',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Farewell',
                'genre' => 'comedy',
                'duration' => '1 hour 20 minutes',
                'views' => '21.1k',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMWE3MjViNWUtY2VjYS00ZDBjLTllMzYtN2FkY2QwYmRiMDhjXkEyXkFqcGdeQXVyODQzNTE3ODc@._V1_.jpg',
                'overall_rating' => 6.9,
                'description' => 'A Chinese family discovers their grandmother has only a short while left to live and decide to keep her in the dark, scheduling a wedding to gather before she dies.',
                'performer_name' => 'Chris Hemsworth',
                'release_date' => '2019-01-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Marriage Story',
                'genre' => 'comedy',
                'duration' => '1 hour 20 minutes',
                'views' => '21.1k',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BZGVmY2RjNDgtMTc3Yy00YmY0LTgwODItYzBjNWJhNTRlYjdkXkEyXkFqcGdeQXVyMjM4NTM5NDY@._V1_.jpg',
                'overall_rating' => 8.8,
                'description' => 'Noah Baumbach\'s incisive and compassionate look at a marriage breaking up and a family staying together.',
                'performer_name' => 'Megan Fox',
                'release_date' => '2019-08-29',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Booksmart',
                'genre' => 'comedy',
                'duration' => '1 hour 20 minutes',
                'views' => '21.1k',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BYzE0ZTY1NGUtOTYxMS00NWYzLWE1NGMtMDU3YzViZDZjZTZkXkEyXkFqcGdeQXVyMTA4NjE0NjEy._V1_.jpg',
                'overall_rating' => 8.2,
                'description' => 'On the eve of their high school graduation, two academic superstars and best friends realize they should have worked less and played more. Determined not to fall short of their peers, the girls try to cram four years of fun into one night.',
                'performer_name' => 'Emma Watson',
                'release_date' => '2019-03-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
