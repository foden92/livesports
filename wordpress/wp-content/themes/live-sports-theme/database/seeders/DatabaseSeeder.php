<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear tables in reverse order
        DB::table('matches')->truncate();
        DB::table('teams')->truncate();
        DB::table('competitions')->truncate();
        DB::table('countries')->truncate();

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Run seeders
        $this->call([
            CountrySeeder::class,
            CompetitionSeeder::class,
            TeamSeeder::class,
            MatchSeeder::class,
        ]);
    }
} 