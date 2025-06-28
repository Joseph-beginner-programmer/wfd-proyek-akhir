<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function showMethod($bookingId)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($bookingId);

        $user = Auth::user(); // Get logged-in user's basic info

        return view('pages.method', [
            'bookingId' => $booking->booking_id,
            'price' => $booking->price,
            'user' => $user
        ]);
    }

    public function process(Request $request)
    {

        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,booking_id',
            'payment_method' => 'required|string',
            'total_price' => 'required|numeric',
        ]);
        
        $booking = Booking::where('booking_id', $validated['booking_id'])->firstOrFail();

        DB::transaction(function () use ($validated, $booking) {
            // Create payment
            Payment::create([
                'booking_id' => $validated['booking_id'],
                'payment_method' => $validated['payment_method'],
                'total_price' => $validated['total_price'],
                'payment_date' => now()->toDateString(), // since your field is `date`, not `datetime`
            ]);

            // Update booking status
            $booking->update(['booking_status' => 'confirmed']);
        });

        return redirect()->route('dashboard1')->with('success', 'Pembayaran berhasil!');
    }
}
