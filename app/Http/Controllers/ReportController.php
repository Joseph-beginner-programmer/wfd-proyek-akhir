<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function index()
    {
        return view("pages.reports");
    }

    public function getUsers()
    {
        $users = User::select(
            'user_id',
            'name',
            'email',
            'role',
        )->orderBy('name')->get();

        return response()->json($users);
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'role' => 'required|in:admin,user'
        ]);

        $user = User::where('user_id', $request->user_id)->firstOrFail();
        $user->role = strtolower($request->role);
        $user->save();

        return response()->json(['message' => 'Role untuk ' . $user->name . ' berhasil diperbarui.']);
    }

    public function getBookings()
    {
        DB::enableQueryLog();
        $bookings = Booking::with([
            'user',
            'venue',
            'payment',
            'bookingHours.jadwalVenue'
        ])->get();

        return response()->json($bookings);
    }

    public function getFinancial()
    {
        $totalRevenue = Payment::sum('total_price');
        $completedBookings = Booking::where('booking_status', 'confirmed')->count();
        $pendingTransactions = Booking::doesntHave('payment')->count();
        $transactions = Payment::with('booking.user')
            ->latest()
            ->get()
            ->map(function ($payment) {
                return [
                    'payment_id'   => $payment->payment_id,
                    'booking_id'       => $payment->booking_id,
                    'customer_name'    => $payment->booking->user->name ?? '-',
                    'total_price'      => $payment->total_price,
                    'payment_method'   => $payment->payment_method,
                    'paid_at'          => $payment->created_at,
                ];
            });

        return response()->json([
            'summary' => [
                'total_revenue'        => $totalRevenue,
                'completed_bookings'   => $completedBookings,
                'pending_transactions' => $pendingTransactions,
            ],
            'transactions' => $transactions,
        ]);
    }
}
