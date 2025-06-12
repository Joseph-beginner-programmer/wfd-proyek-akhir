<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalVenue extends Model
{
    public function bookings()
    {
        return $this->belongsToMany(JadwalVenue::class, 'booking_hour', 'booking_id', 'booking_hour_id')->withTimestamps();
    }
}
