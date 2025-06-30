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
             "user_id"=>"1",
             "name" => "Lapangan Tennis",
             "address" => "Jalan Kemang no 124",
             "price_per_hour" => "32000",
             "description" => "ini tempat yang keren",
             "capacity" => "20",
             "provinsi" => "Jawa Barat",
             "phone_contact" => "00000000000",
             "image_path" => "venues/lapangan-sepak-bola.jpg"],
             ["type_id" => "2",
             "user_id"=>"2",
             "name" => "Gedung Pernikahan Jemursari",
             "address" => "Jalan Jemursai No 200",
             "price_per_hour" => "100000",
             "description" => "ini tempat nikah yang bagus buat anda dengan budget limited",
             "capacity" => "120",
             "provinsi" => "Surabaya",
             "phone_contact" => "00000000000",
             "image_path" => "venues/wedding.jpg"],
             ["type_id" => "3",
             "user_id"=>"2",
             "name" => "Pantai Indah Karang",
             "address" => "Jalan Indah No 10",
             "price_per_hour" => "70000",
             "description" => "ini tempat anda dapat bersantai santai dengan teman anda sambil menikmati minuman",
             "capacity" => "120",
             "provinsi" => "Jawa Tengah",
             "phone_contact" => "00000000000",
             "image_path" => "venues/beach.webp"],
        ];
 
        foreach ($types as $type) {
            Venue::create($type);
        }
    }
}
