<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JadwalVenueSeeder extends Seeder
{
    public function run()
    {
        $venueId = DB::table('venues')->first()->venue_id; // or use a known ID like 1

        $start = Carbon::createFromTimeString('07:00:00');
        $end = Carbon::createFromTimeString('22:00:00');

        while ($start->lt($end)) {
            $next = $start->copy()->addHour();

            DB::table('jadwal_venues')->insert([
                'venue_id' => $venueId,
                'start_time' => $start->format('H:i:s'),
                'end_time' => $next->format('H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
                'is_active' => true,
            ]);

            $start = $next;
        }
    }
}
