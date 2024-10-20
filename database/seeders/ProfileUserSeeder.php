<?php

namespace Database\Seeders;

use App\Models\ProfileUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalRecords = 100;
        $chunkSize = 100;
        $chunks = array_chunk(range(1, $totalRecords), $chunkSize);

        foreach ($chunks as $chunk) {
            ProfileUser::factory()->count(count($chunk))->create();
        }
    }
}
