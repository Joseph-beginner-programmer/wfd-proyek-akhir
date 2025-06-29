<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $primaryKey = 'booking_id';
    
    protected $fillable = [
        'user_id',
        'venue_id',
        'booking_date',
        'booking_status',
        'price',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'venue_id');
    }

    public function bookingHours()
    {
        return $this->hasMany(BookingHour::class, 'booking_id');
    }
 
    public function jadwalVenues()
    {
        return $this->hasManyThrough(
            JadwalVenue::class,
            BookingHour::class,
            'booking_id',        
            'jadwal_id',         
            'id',                
            'booking_hour_id'  
        );
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id', 'booking_id');
    }
}
