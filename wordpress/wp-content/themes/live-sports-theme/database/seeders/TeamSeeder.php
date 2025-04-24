<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    public function run()
    {
        DB::table('teams')->insert([
            // Teams in Giải bóng đá nữ Algeria
            [
                'id' => 'AKBOU-W',
                'competition_id' => 'ALG-W',
                'country_id' => 'DZ',
                'name' => 'CLB nữ Akbou',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=AKB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'AFAK-W',
                'competition_id' => 'ALG-W',
                'country_id' => 'DZ',
                'name' => 'Afak Relizane(w)',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=AFK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'KHROUB-W',
                'competition_id' => 'ALG-W',
                'country_id' => 'DZ',
                'name' => 'CLB nữ Jf Khroub',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=KHR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'ASE-ALGER-W',
                'competition_id' => 'ALG-W',
                'country_id' => 'DZ',
                'name' => 'ASE Alger Centre (w)',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=ASE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'BELOUIZDAD-W',
                'competition_id' => 'ALG-W',
                'country_id' => 'DZ',
                'name' => 'CR Belouizdad (w)',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=BEL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'ASE-BEJAIA-W',
                'competition_id' => 'ALG-W',
                'country_id' => 'DZ',
                'name' => 'ASE Bejaia (w)',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=ASB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Teams in Liga U21 Youth Algeria
            [
                'id' => 'SAOURA-U21',
                'competition_id' => 'ALG-U21',
                'country_id' => 'DZ',
                'name' => 'Saoura U21',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=SAO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'KABYLIE-U21',
                'competition_id' => 'ALG-U21',
                'country_id' => 'DZ',
                'name' => 'Kabylie U21',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=KAB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Teams in Siêu cúp Ấn Độ
            [
                'id' => 'HYDERABAD',
                'competition_id' => 'IND-SC-A',
                'country_id' => 'IN',
                'name' => 'Hyderabad',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=HYD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'SREENIDI',
                'competition_id' => 'IND-SC-A',
                'country_id' => 'IN',
                'name' => 'Sreenidi Deccan',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=SRE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Teams in Giải ngoại hạng Bangladesh
            [
                'id' => 'FORTIS',
                'competition_id' => 'BAN-PL',
                'country_id' => 'BD',
                'name' => 'Fortis Limited',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=FOR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'RAHMATGONJ',
                'competition_id' => 'BAN-PL',
                'country_id' => 'BD',
                'name' => 'Rahmatgonj MFS',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=RAH',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'SHEIKH-JAMAL',
                'competition_id' => 'BAN-PL',
                'country_id' => 'BD',
                'name' => 'Sheikh Jamal',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=SHJ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'BASHUNDHARA',
                'competition_id' => 'BAN-PL',
                'country_id' => 'BD',
                'name' => 'Bashundhara Kings',
                'logo' => 'https://placehold.co/24x24/cccccc/ffffff.png?text=BAS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 