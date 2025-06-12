<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalVenue extends Model
{
    public function bookingHours()
    {
        return $this->hasMany(BookingHour::class, 'booking_hour_id');
    }


    protected $fillable = [
        'start_time',
        'end_time',
        'is_active'
    ];
    public function bookings()
    {
        return $this->belongsToMany(JadwalVenue::class, 'booking_hour', 'booking_id', 'booking_hour_id')->withTimestamps();
    }
}
