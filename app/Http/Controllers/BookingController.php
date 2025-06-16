<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingHour;
use App\Models\JadwalVenue;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('venue')
            ->where('user_id', Auth::id())
            ->orderByDesc('booking_date')
            ->get();

        return view('dashboard', compact('bookings'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'venue_id' => 'required|exists:venues,venue_id',
            'jadwal_ids' => 'required|array',
            'jadwal_ids.*' => 'exists:jadwal_venues,jadwal_id', // Adjust table & column names as needed
        ]);

        try {
            // Create the booking record
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'venue_id' => $validated['venue_id'],
                'status' => 'pending', // You can change this to 'confirmed' if applicable
                'booking_date' => $request->input('booking_date'), // if you pass this too
            ]);

            // Save selected booking hours
            foreach ($validated['jadwal_ids'] as $jadwalId) {
                BookingHour::create([
                    'booking_id' => $booking->booking_id, // or $booking->booking_id based on your schema
                    'booking_hour_id' => $jadwalId,
                    'is_active' => true,
                ]);
            }


            return redirect()->route('venues')
                ->with('success', 'Booking created successfully!');
        } catch (\Exception $e) {
            // Optional: handle unexpected issues
            return redirect()->back()
                ->withErrors(['error' => 'An error occurred while processing your booking.'])
                ->withInput();
        }
    }

    public function getPendingBookingCount()
    {
        $count = Booking::where('user_id', Auth::id())
            ->where('booking_status', 'pending')
            ->count();

        return response()->json(['count' => $count]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venue = Venue::with('tipeVenue')->findOrFail($id);
        $dates = collect();
        for ($i = 0; $i < 7; $i++) {
            $dates->push(Carbon::now()->addDays($i));
        }
        // 2. Ambil SEMUA potensi jadwal dari tabel JadwalVenue.
        $allJadwals = JadwalVenue::where('venue_id', $id)->where('is_active', 1)->orderBy('start_time')->get();

        // 3. Ambil ID jadwal yang SUDAH DIBOOKING pada tanggal target.
        // Ini adalah logika kuncinya.
        // Asumsi: tabel 'bookings' punya kolom 'booking_date' dan 'jadwal_venue_id'
        // $bookedJadwalIds = Booking::whereDate('booking_date', )
        //     ->where('status', 'confirmed') // Hanya cek booking yang sudah dikonfirmasi
        //     ->pluck('jadwal_venue_id')
        //     ->toArray();

        // // 4. Proses data untuk dikirim ke view.
        // // Kita tambahkan properti 'is_booked' ke setiap objek jadwal.
        // $jadwals = $allJadwals->map(function ($jadwal) use ($bookedJadwalIds) {
        //     $jadwal->is_booked = in_array($jadwal->id, $bookedJadwalIds);
        //     // Anda bisa tambahkan logika harga dinamis di sini jika perlu
        //     // Contoh: $jadwal->price = 240000;
        //     return $jadwal;
        // });
        return view('pages.detail', [
            'venue' => $venue,
            'dates' => $dates,
            'allJadwals' => $allJadwals,
            'selectedDate' => Carbon::now()->format('Y-m-d'),
        ]);
    }

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
