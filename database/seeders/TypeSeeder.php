<?php

namespace Database\Seeders;

use App\Models\tipe_venue;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["type_name" => "Sports"],
            ["type_name" => "Ballroom"],
            ["type_name" => "Outdoor"],
            ["type_name" => "Arts"],
        ];

        foreach ($types as $type) {
            tipe_venue::create($type);
        }
    }
}
