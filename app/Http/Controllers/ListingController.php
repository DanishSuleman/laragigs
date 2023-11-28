<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    public static function index () {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
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


    public static function edit (Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
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

        if($request->hasFile('logo')){
        $incomingFields['logo'] = $request->file('logo')->store('logos', 'public');
    
    }
        Listing::create($incomingFields);

        return redirect('/')->with('message', 'Listing Created Successfully!');
    }


    
    public static function update (Request $request, Listing $listing) {

        $incomingFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
        $incomingFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

        $listing->update($incomingFields);

        return back()->with('message', 'Listing Updated Successfully!');
    }

    public function destroy(Listing $listing) {

        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully!');

    }

}
