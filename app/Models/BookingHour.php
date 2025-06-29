<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingHour extends Model
{
    protected $table = 'booking_hour';

    protected $fillable = [
        'booking_id',
        'booking_hour_id',
        'is_active',
        'jadwal_id'      
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function jadwalVenue()
    {
        return $this->belongsTo(JadwalVenue::class, 'jadwal_id', 'jadwal_id');
    }
}
