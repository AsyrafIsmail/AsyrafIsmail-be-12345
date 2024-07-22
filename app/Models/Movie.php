<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'title',
        'release_date',
        'duration',
        'description',
        'mpaa_rating',
        'genres',
        'director',
        'performers',
        'language',
    ];
}
