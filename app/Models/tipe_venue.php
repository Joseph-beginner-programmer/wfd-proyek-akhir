<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipe_venue extends Model
{
    protected $table = 'tipe_venue';
    protected $fillable = [
        'type_id',
        'type_name'
    ];
}
