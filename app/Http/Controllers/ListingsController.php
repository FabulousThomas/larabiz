<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listing = Listing::orderBy('created_at', 'desc')->get();
        return view('listings')->with('listings', $listing);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createlisting');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
        ]);

        // Create Listing
        $listing = new Listing;

        $listing->name = $request->input('name');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->address = $request->input('address');
        $listing->bio = $request->input('bio');
        $listing->user_id = auth()->user()->id;

        $listing->save();

        return redirect('/dashboard')->with('success', 'Listing Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = Listing::find($id);
        return view('showlisting')->with('listing', $listing);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::find($id);
        return view('/editlisting')->with('listing', $listing);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
        ]);

        // Create Listing
        $listing = Listing::find($id);

        $listing->name = $request->input('name');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->address = $request->input('address');
        $listing->bio = $request->input('bio');
        $listing->user_id = auth()->user()->id;

        $listing->save();

        return redirect('/dashboard')->with('success', 'Listing Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect('/dashboard')->with('success', 'Listing Removed');
    }
}