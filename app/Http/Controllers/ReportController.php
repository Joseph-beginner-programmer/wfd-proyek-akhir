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
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');
        $completedBookings = Booking::where('status', 'completed')->count();
        $pendingTransactions = Booking::where('status', 'confirmed')
            ->whereDoesntHave('payment', function ($query) {
                $query->where('status', 'paid');
            })->count();

        $transactions = Payment::where('payments.status', 'paid')
            ->join('bookings', 'payments.booking_id', '=', 'bookings.booking_id')
            ->join('users', 'bookings.user_id', '=', 'users.user_id')
            ->select(
                'payments.payment_id as transaction_id',
                'payments.booking_id',
                'users.name as customer_name',
                'payments.amount',
                'payments.payment_method',
                'payments.created_at as paid_at'
            )
            ->orderBy('payments.created_at', 'desc')
            ->get();

        $financialData = [
            'summary' => [
                'total_revenue' => $totalRevenue,
                'completed_bookings' => $completedBookings,
                'pending_transactions' => $pendingTransactions,
            ],
            'transactions' => $transactions
        ];

        return response()->json($financialData);
    }
}
