<?php

use App\Http\Controllers\ProdCompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

// ::resource creates all standart routes for prodcompanies
Route::resource('prodcompanies', ProdCompanyController::class);

// This custom POST route allows you to create a production company tied to a specific movie
Route::post('movies/{movie}/prodcompanies', [ProdCompanyController::class, 'store'])->name('prodcompanies.store');

// Attempting Custom route for ProdCompany edit
// Route::put('movies/{movie}/prodcompanies/{prodCompany}', [ProdCompanyController::class, 'update'])->name('prodcompanies.update');
// Route::get('movies/{movie}/prodcompanies/{prodCompany}/edit', [ProdCompanyController::class, 'edit'])->name('prodcompanies.edit');

require __DIR__.'/auth.php';
