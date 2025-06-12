<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalVenue extends Model
{
    public function bookingHours()
{
    return $this->hasMany(BookingHour::class, 'booking_hour_id');
}

}
