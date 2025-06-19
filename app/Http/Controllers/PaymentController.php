<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
