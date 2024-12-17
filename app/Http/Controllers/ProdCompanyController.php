<?php

namespace App\Http\Controllers;

use App\Models\Movie; // Importing the Movie model
use App\Models\ProdCompany;
use Illuminate\Http\Request;

class ProdCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Movie $movie) // Accept movie as a parameter
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'company_value' => 'required|integer|min:1',
        ]);

        // Create a new ProdCompany and associate it with the specified movie
        $movie->prodcompanies()->create([
            'name' => $request->input('name'),
            'company_value' => $request->input('company_value'),
            'movie_id' => $movie->id, // Associate the prod company with the movie
        ]);

        // Redirect back with a success message
        return redirect()->route('movies.show', $movie->id)->with('success', 'Production company added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdCompany $prodCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdCompany $prodCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdCompany $prodCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdCompany $prodCompany)
    {
        //
    }
}
