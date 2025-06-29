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
        $validated = $request->validate([
            'price' => 'required|numeric',
            'venue_id' => 'required|exists:venues,venue_id',
            'jadwal_ids' => 'required|array',
            'jadwal_ids.*' => 'exists:jadwal_venues,jadwal_id',
        ]);

        try {
            $booking = Booking::create([

                'user_id' => Auth::id(),
                'venue_id' => $validated['venue_id'],
                'status' => 'pending', 
                'booking_date' => $request->input('booking_date'), 
                'price' => $validated['price'],
            ]);
            foreach ($validated['jadwal_ids'] as $jadwalId) {
                BookingHour::create([
                    'booking_id' => $booking->booking_id,
                    'jadwal_id' => $jadwalId,
                    'is_active' => true,
                ]);
            }
            return redirect()->route('booking.summary', [
                'id' => $booking->booking_id
            ])->with(['venue_id' => $request->venue_id]);;
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'An error occurred while processing your booking.'])
                ->withInput();
        }
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

        $selectedDate = Carbon::now()->format('Y-m-d');
        $allJadwals = JadwalVenue::where('venue_id', $id)
            ->orderBy('start_time')
            ->get()
            ->map(function ($jadwal) use ($selectedDate) {
                $isBooked = BookingHour::where('jadwal_id', $jadwal->jadwal_id)
                    ->whereHas('booking', function ($query) use ($selectedDate) {
                        $query->where('booking_date', $selectedDate);
                    })
                    ->exists();

                $jadwal->is_active = !$isBooked;
                return $jadwal;
            });

        return view('pages.detail', [
            'venue' => $venue,
            'dates' => $dates,
            'allJadwals' => $allJadwals,
            'selectedDate' => $selectedDate,
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

    public function summary($id, Request $request)
    {
        $booking = Booking::with(['venue', 'bookingHours.jadwalVenue'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);
        $venue_id = $request->input('venue_id') ?? $booking->venue_id;
        return view('pages.payment', compact('booking', 'venue_id'));
    }

    public function showBookingDetail($id)
    {
        $booking = Booking::with(['user', 'venue', 'bookingHours.jadwalVenue'])->findOrFail($id);
        return view('pages.show_detail', compact('booking'));
    }

     public function getPendingBookingCount()
    {
        $count = Booking::where('user_id', Auth::id())
            ->where('booking_status', 'pending')
            ->count();
        return response()->json(['count' => $count]);
    }
}
