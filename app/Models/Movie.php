<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'pg_rating',
        'rating',
        'budget',
        'release_date',
        'running_time',
        'image_id',
    ];
}
