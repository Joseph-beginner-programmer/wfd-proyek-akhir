<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\tipe_venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function Illuminate\Log\log;

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
        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('venues', 'public');
            $validatedData['image_path'] = $path;
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

    public function search(Request $request)
    {
        $venues = Venue::with('tipeVenue')
            ->when(
                $request->filled('type'),
                fn($q) =>
                $q->whereHas(
                    'tipeVenue',
                    fn($q2) =>
                    $q2->whereRaw('LOWER(type_name) LIKE ?', ['%' . strtolower($request->type) . '%'])
                )
            )
            ->get();

        
        return view('pages.venue-cards', compact('venues'));
    }

    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venue = Venue::with('jadwal_venues')->findOrFail($id);
        $tipe_venue = tipe_venue::all();;
        return view('pages.create', [
            'venue' => $venue,
            'tipe_venue' => $tipe_venue,
            'editMode' => true
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:tipe_venue,type_id',
            'address' => 'required|string',
            'provinsi' => 'required|string',
            'description' => 'required|string',
            'price_per_hour' => 'required|numeric',
            'capacity' => 'required|integer',
            'phone_contact' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jadwal_venues' => 'required|array',
            'jadwal_venues.*.start_time' => 'required|date_format:H:i:s',
            'jadwal_venues.*.end_time' => 'required|date_format:H:i:s',
        ]);

        $venue = Venue::findOrFail($id);
        $venue->update($validated);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('venue_images', 'public');
            $venue->image_path = $imagePath;
            $venue->save();
        }

        $venue->jadwal_venues()->delete();

        foreach ($request->jadwal_venues as $jadwal) {
            $venue->jadwal_venues()->create([
                'start_time' => $jadwal['start_time'],
                'end_time' => $jadwal['end_time'],
                'is_active' => true,
            ]);
        }

        return redirect()->route('venues.myVenues')->with('success', 'Venue berhasil diperbarui!');
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

        return redirect()->route('venues.myVenues')->with('success', 'Venue berhasil dihapus.');
    }

    public function myVenues()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $venues = $user->venues()->latest()->get();

        return view('pages.my_venues', ['venues' => $venues]);
    }
}
