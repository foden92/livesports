<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->insert([
            [
                'id' => 'DZ',
                'name' => 'Algeria',
                'logo' => 'https://placehold.co/20x20/cccccc/ffffff.png?text=DZ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'IN',
                'name' => 'Ấn Độ',
                'logo' => 'https://placehold.co/20x20/cccccc/ffffff.png?text=IN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'BD',
                'name' => 'Bangladesh',
                'logo' => 'https://placehold.co/20x20/cccccc/ffffff.png?text=BD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 