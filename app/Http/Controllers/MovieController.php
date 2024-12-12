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
            'pg_rating' => 'required',
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
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:500',
            'pg_rating' => 'required',
            'rating' => 'required|numeric|min:0|max:5',
            'budget' => 'required|integer',
            'release_date' => 'required|integer|min:1900|max:2024',
            'running_time' => 'required|integer|min:1|max:300',
            'image_id' => 'nullable|image|mimes:jpeg,png,jpg,jiff|max:4096', // image is optional on update
        ]);
    
        // If a new image is uploaded, handle the upload and update the image file path
        if ($request->hasFile('image_id')) {
            // Delete the old image from storage if exists
            if ($movie->image_id) {
                $oldImagePath = public_path('images/movies/' . $movie->image_id);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Upload the new image
            $imageName = time() . '.' . $request->file('image_id')->extension();
            $request->file('image_id')->move(public_path('images/movies'), $imageName);
        } else {
            // Keep the old image if no new one is uploaded
            $imageName = $movie->image_id;
        }
    
        // Update the movie record
        $movie->update([
            'name' => $request->name,
            'description' => $request->description,
            'pg_rating' => $request->pg_rating,
            'rating' => $request->rating,
            'budget' => $request->budget,
            'release_date' => $request->release_date,
            'running_time' => $request->running_time,
            'image_id' => $imageName, // Update the image if a new one was uploaded
        ]);
    
        // Redirect to the index page with a success message
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        // Delete the movie record from the database
        $movie->delete();
    
        // Redirect back to the movies index page with a success message
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}
