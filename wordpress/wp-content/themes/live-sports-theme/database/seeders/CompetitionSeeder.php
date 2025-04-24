<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionSeeder extends Seeder
{
    public function run()
    {
        DB::table('competitions')->insert([
            [
                'id' => 'ALG-W',
                'name' => 'Giải bóng đá nữ Algeria',
                'logo' => 'https://placehold.co/20x20/cccccc/ffffff.png?text=ALG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'ALG-U21',
                'name' => 'Liga U21 Youth Algeria',
                'logo' => 'https://placehold.co/20x20/cccccc/ffffff.png?text=ALG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'IND-SC-A',
                'name' => 'Siêu cúp Ấn Độ - Bảng đấu A',
                'logo' => 'https://placehold.co/20x20/cccccc/ffffff.png?text=IND',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'BAN-PL',
                'name' => 'Giải ngoại hạng Bangladesh - Vòng 4',
                'logo' => 'https://placehold.co/20x20/cccccc/ffffff.png?text=BAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 