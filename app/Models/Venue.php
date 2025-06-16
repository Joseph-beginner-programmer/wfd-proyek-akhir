<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venue extends Model
{
    protected $primaryKey = "venue_id";
    protected $fillable = [
        'user_id',
        'venue_id',
        'type_venue',
        'name',
        'address',
        'description',
        'price_per_hour',
        'capacity',
        'provinsi',
        'phone_contact',
        'image_path',
        'type_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tipeVenue(): BelongsTo
    {
        return $this->belongsTo(tipe_venue::class, 'type_id', 'type_id');
    }

    public function jadwal_venues()
    {
        return $this->hasMany(JadwalVenue::class, 'venue_id');
    }
}
