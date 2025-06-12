<?php

namespace App\Http\Controllers;

use App\Models\tipe_venue;
use App\Models\Venue;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::all();
        $tipe_venue = tipe_venue::all();
        return view('pages.product', [
            'venues' => $venues,
<<<<<<< HEAD
            'tipe_venue' =>$tipe_venue
=======
            'tipe_venue' => $tipe_venue
>>>>>>> Marcel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipe_venue = tipe_venue::all();
        return view('pages.create', ['tipe_venue' => $tipe_venue]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
<<<<<<< HEAD
            'type_id'       => 'required|exists:tipe_venue,type_id',
            'name'          => 'required|string|max:255',
            'address'       => 'required|string',
            'description'   => 'required|string',
            'price_per_hour' => 'required|integer',
            'capacity'      => 'required|integer',
            'provinsi'      => 'required|string|max:255',
            'phone_contact' => 'required|string|max:20',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validatedData) {
            Venue::create($validatedData);
            return redirect()->route('venues');
        }
=======
            'type_id'        => 'required|exists:tipe_venue,type_id',
            'name'           => 'required|string|max:255',
            'address'        => 'required|string',
            'description'    => 'required|string',
            'price_per_hour' => 'required|integer',
            'capacity'       => 'required|integer',
            'provinsi'       => 'required|string|max:255',
            'phone_contact'  => 'required|string|max:20',
            'image_path'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('venues', 'public');
            $validatedData['image_path'] = $path; // Save the path in DB
        }


        $venue = new Venue($validatedData);
        $venue->save();
        

        return redirect()->route('venues')->with('success', 'Venue created successfully!');
>>>>>>> Marcel
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
