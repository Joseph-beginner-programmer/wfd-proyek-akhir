<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["name" => "Marcel", "email" => "C14230099@john.petra.ac.id","role" => "user","password" => "marcel123"],
            ["name" => "Joseph","email" => "C14230095@gmail.com","role" => "admin","password" => "joseph123"],
        ];

        foreach ($types as $type) {
            User::create($type);
        }
    }
}
