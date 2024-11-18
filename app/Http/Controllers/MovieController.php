<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all(); //This line fetches all movies!
        return view('movies.index', compact('movies')); //this line returns the View all section with movies
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate input
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:500',
            'pg_rating' => 'required|integer',
            'rating' => 'required|numeric',
            'budget' => 'required|integer',
            'release_date' => 'required|integer',
            'running_time' => 'required|integer',
            'image_id' => 'required|image|mimes:jpeg,png,jpg,jiff|max:4096',
        ]);

        // This checks if the image is uploaded and if it can handle it
        if ($request->hasFile('image_id')) {

            $imageName = time().'.'.$request->file('image_id')->extension();
            $request->file('image_id')->move(public_path('images/movies'), $imageName);
        }

        // Creates a new movie record in the db
        Movie::create([
            'name' => $request->name,
            'description' => $request->description,
            'pg_rating' => $request->pg_rating,
            'rating' => $request->rating,
            'budget' => $request->budget,
            'release_date' => $request->release_date,
            'running_time' => $request->running_time,
            'image_id' => $imageName,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Redirect to index page with a success message
        return to_route('movies.index')->with('success', 'Movie created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
