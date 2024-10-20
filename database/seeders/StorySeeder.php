<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
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
            Story::factory()->count(count($chunk))->create();
        }
    }
}
