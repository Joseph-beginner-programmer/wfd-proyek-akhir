<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalVenue extends Model
{
    protected $fillable = [
        'start_time',
        'end_time',
        'is_active',
        'venue_id'
    ];
    public function bookingHours()
    {
        return $this->hasMany(BookingHour::class, 'jadwal_id', 'jadwal_id');
    }
    public function bookings()
    {
        return $this->belongsToMany(JadwalVenue::class, 'booking_hour', 'booking_id', 'booking_hour_id')->withTimestamps();
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'venue_id');
    }
}
