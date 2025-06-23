<?php

namespace Database\Seeders;

use App\Models\Competition;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Competition::insert([
            [
                'degree' => 'SD',
                'nama' => 'Lomba Biologi Tingkat SD',
                'competition_start' => Carbon::create(2025, 9, 20, 8, 0, 0),
                'competition_end' => Carbon::create(2025, 9, 20, 12, 0, 0),
            ],
            [
                'degree' => 'SMP',
                'nama' => 'Lomba Biologi Tingkat SMP',
                'competition_start' => Carbon::create(2025, 9, 20, 8, 0, 0),
                'competition_end' => Carbon::create(2025, 9, 20, 12, 0, 0),
            ],
            [
                'degree' => 'SMA',
                'nama' => 'Lomba Biologi Tingkat SMA',
                'competition_start' => Carbon::create(2025, 9, 20, 8, 0, 0),
                'competition_end' => Carbon::create(2025, 9, 20, 12, 0, 0),
            ],
        ]);
    }
}
