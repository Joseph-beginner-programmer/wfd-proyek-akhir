<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingHour extends Model
{
    protected $table = 'booking_hour'; // Explicitly define table name if not plural

    protected $fillable = [
        'booking_id',
        'booking_hour_id', // FK to jadwal_venue
        'is_active',       // or any other additional fields
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function jadwalVenue()
    {
        return $this->belongsTo(JadwalVenue::class, 'booking_hour_id');
    }
}
