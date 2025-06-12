<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venue extends Model
{
    protected $fillable = [
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
<<<<<<< HEAD
=======

>>>>>>> Marcel
    public function tipeVenue(): BelongsTo
    {
        return $this->belongsTo(tipe_venue::class, 'type_id', 'type_id');
    }
}
