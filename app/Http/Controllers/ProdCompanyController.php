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
            'name' => 'required|string|max:25',
            'company_value' => 'required|integer|min:1|max:20000',
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
        // Security in place for regular users to not be able to edit production companies
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('movies.index')->with('error', 'Access denied. >:(');
        }
        return view('prodcompany.edit', compact('prodCompany'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdCompany $prodCompany)
    {

        //Ensuring user is authourised
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('movies.index')->with('error', 'Access denied. >:(');
        }

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:25',
            'company_value' => 'required|integer|min:1|max:20000',
        ]);

        // Update the production company with validated data
        $prodCompany->update($request->only(['name', 'company_value']));

        // Redirect to the associated movie's page or another relevant route
        return redirect()->route('movies.show', $prodCompany->movie_id)
                ->with('success', 'Production company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdCompany $prodCompany)
    {
        //
    }
}
