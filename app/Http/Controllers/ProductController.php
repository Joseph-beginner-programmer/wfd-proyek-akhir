<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\tipe_venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'tipe_venue' => $tipe_venue
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
            'type_id'        => 'required|exists:tipe_venue,type_id',
            'name'           => 'required|string|max:255',
            'address'        => 'required|string',
            'description'    => 'required|string',
            'price_per_hour' => 'required|integer',
            'capacity'       => 'required|integer',
            'provinsi'       => 'required|string|max:255',
            'phone_contact'  => 'required|string|max:20',
            'image_path'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jadwal_venues' => 'required|array',
            'jadwal_venues.*.start_time' => 'required|date_format:H:i',
            'jadwal_venues.*.end_time' => 'required|date_format:H:i|after:jadwal_venues.*.start_time',
        ]);
        $validatedData['user_id'] = Auth::id();

        // Handle file upload
        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('venues', 'public');
            $validatedData['image_path'] = $path; // Save the path in DB
        }


        $venue = new Venue($validatedData);
        $venue->save();

        foreach ($validatedData['jadwal_venues'] as $jadwal) {
            $venue->jadwal_venues()->create([
                'start_time' => $jadwal['start_time'],
                'end_time' => $jadwal['end_time'],
                'is_active' => true
            ]);
        }


        return redirect()->route('venues')->with('success', 'Venue created successfully!');
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
        $venue = Venue::with('jadwal_venues')->findOrFail($id);
        $tipe_venue = tipe_venue::all();;
        return view('pages.create', [ // pakai view yang sama
            'venue' => $venue,
            'tipe_venue' => $tipe_venue,
            'editMode' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    { {
            // Validasi data yang masuk (sama seperti di method store)
            $validatedData = $request->validate([
                'type_id'        => 'required|exists:tipe_venue,type_id',
                'name'           => 'required|string|max:255',
                'address'        => 'required|string',
                'description'    => 'required|string',
                'price_per_hour' => 'required|integer',
                'capacity'       => 'required|integer',
                'provinsi'       => 'required|string|max:255',
                'phone_contact'  => 'required|string|max:20',
                'image_path'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'jadwal_venues' => 'required|array',
                'jadwal_venues.*.start_time' => 'required|date_format:H:i',
                'jadwal_venues.*.end_time' => 'required|date_format:H:i|after:jadwal_venues.*.start_time',
            ]);
            if ($request->hasFile('image_path')) {
                $path = $request->file('image_path')->store('venues', 'public');
                $validatedData['image_path'] = $path;
            }
            $venue->update($validatedData);

            return redirect()->route('venues.myVenues')->with('success', 'Venue berhasil diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {

        if ($venue->image_path) {
            Storage::disk('public')->delete($venue->image_path);
        }

        $venue->delete();

        return redirect()->route('my_venues.index')->with('success', 'Venue berhasil dihapus.');
    }

    public function myVenues()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $venues = $user->venues()->latest()->get();

        return view('pages.my_venues', ['venues' => $venues]);
    }
}
