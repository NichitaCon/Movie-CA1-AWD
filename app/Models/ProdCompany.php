<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'company_value',
        'movie_id',
    ];

    // Defining the relationship, ProdCompany belongs to a Movie.
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
