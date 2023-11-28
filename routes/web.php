<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Show all listings
Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('listings/create', [ListingController::class, 'create']);

// Show edit form
Route::get('listings/edit/{listing}', [ListingController::class, 'edit']);

// Update listing
Route::put('listings/{listing}', [ListingController::class, 'update']);

// Store listing
Route::post('/listings/store', [ListingController::class, 'store']);

// Delete listing
Route::delete('/listings/delete/{listing}', [ListingController::class, 'destroy']);

// Show single listings
Route::get('listings/{listing}', [ListingController::class, 'show']);