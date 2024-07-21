<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'theater_name',
        'start_time',
        'end_time',
        'title',
        'duration',
        'views',
        'genre',
        'poster',
        'overall_rating',
        'theater_room_no',
        'description',
    ];
}
