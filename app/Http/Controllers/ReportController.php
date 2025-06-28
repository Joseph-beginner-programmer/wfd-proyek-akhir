<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venue;
use Illuminate\View\View;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\JadwalVenue;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $users = User::all();
        $venues = Venue::all();
        $bookings = Booking::with(['user', 'venue'])->get();
        return view("reports.index", [
            'venues' => $venues,
            'tipe_venue' => $users,
            'bookings' => $bookings
        ]);
    }

    // Tanda merah pada ": View" akan hilang
    public function getPartial(string $reportName): View
    {
        $viewPath = match ($reportName) {
            'users'     => 'reports.partials._users-report',
            'booking'   => 'reports.partials._booking-report',
            'financial' => 'reports.partials._financial-report',
            default => null,
        };

        if (is_null($viewPath)) {
            abort(404);
        }
        return view($viewPath);
    }
}
