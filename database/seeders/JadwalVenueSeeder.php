<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JadwalVenueSeeder extends Seeder
{
    public function run()
    {
        $start = Carbon::createFromTimeString('07:00:00');
        $end = Carbon::createFromTimeString('22:00:00'); // Adjust as needed

        while ($start->lt($end)) {
            $next = $start->copy()->addHour();

            DB::table('jadwal_venues')->insert([
                'start_time' => $start->format('H:i:s'),
                'end_time' => $next->format('H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
                'is_active' => true
            ]);

            $start = $next;
        }
    }
}
