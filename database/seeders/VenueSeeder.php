<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["type_id" => "1",
             "name" => "Lapangan Tennis",
             "address" => "Jalan Kemang no 124",
             "description" =>"rehehergergreggreger",
             "price_per_hour" => "32000",
             "description" => "ini tempat yang keren",
             "capacity" => "20",
             "provinsi" => "Jawa Barat",
             "phone_contact" => "00000000000",
             "image_path" => "venues/lapangan-sepak-bola.jpg"],
            
        ];
 
        foreach ($types as $type) {
            Venue::create($type);
        }
    }
}
