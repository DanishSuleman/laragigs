<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    public static function index () {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    public static function show (Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    
    public static function create () {
        return view('listings.create');
    }


    public static function store (Request $request) {

        $incomingFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required'
        ]);

        Listing::create($incomingFields);

        return redirect('/')->with('message', 'Listing Created Successfully!');
    }
}
