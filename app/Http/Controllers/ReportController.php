<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venue;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\View\View;
use App\Models\JadwalVenue;
use Illuminate\Http\Request;
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
        )->get();

        return response()->json($users);
    }
    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'role' => 'required|in:admin,user' // pastikan sesuai database
        ]);
Log::info('Update Role Request', $request->all());

        $user = User::where('user_id', $request->user_id)->first();
        $user->role = strtolower($request->role);
        $user->save();

        return response()->json(['message' => 'Role berhasil diperbarui.']);
    }

    /**
     * Mengambil data laporan booking.
     */
    public function getBookings()
    {
        // GANTI DENGAN LOGIKA DATABASE ANDA
        // Contoh: $bookings = Booking::with('user', 'venue')->latest()->get();

        // Data dummy:
        $dummyBookings = [
            ['booking_id' => 'RSRV-20250628-001', 'customer_name' => 'Citra Lestari', 'venue_name' => 'Aula Serbaguna', 'start_date' => '2025-07-10', 'end_date' => '2025-07-11', 'booking_status' => 'Confirmed', 'total_price' => 1500000, 'payment_status' => 'Paid', 'created_at' => '2025-06-28T10:30:00Z'],
            ['booking_id' => 'RSRV-20250627-005', 'customer_name' => 'Andi Wijaya', 'venue_name' => 'Lapangan Futsal', 'start_date' => '2025-08-01', 'end_date' => '2025-08-01', 'booking_status' => 'Pending', 'total_price' => 250000, 'payment_status' => 'Unpaid', 'created_at' => '2025-06-27T15:00:00Z'],
        ];

        // return response()->json($dummyBookings);

    }

    /**
     * Mengambil data laporan keuangan.
     */
    public function getFinancial()
    {
        // GANTI DENGAN LOGIKA DATABASE ANDA (agregasi, dll)

        // Data dummy:
        $dummyFinancial = [
            'summary' => [
                'total_revenue' => 7550000,
                'completed_bookings' => 15,
                'pending_transactions' => 3,
            ],
            'transactions' => [
                ['transaction_id' => 'TRX-101', 'booking_id' => 'RSRV-20250628-001', 'customer_name' => 'Citra Lestari', 'amount' => 1500000, 'payment_method' => 'Bank Transfer', 'paid_at' => '2025-06-28T11:00:00Z'],
                ['transaction_id' => 'TRX-102', 'booking_id' => 'RSRV-20250625-002', 'customer_name' => 'Budi Santoso', 'amount' => 500000, 'payment_method' => 'Credit Card', 'paid_at' => '2025-06-26T09:15:00Z'],
            ]
        ];
        return response()->json($dummyFinancial);
    }
}
