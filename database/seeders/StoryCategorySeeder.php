<?php

namespace Database\Seeders;

use App\Models\StoryCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoryCategorySeeder extends Seeder
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
            StoryCategory::factory()->count(count($chunk))->create();
        }
    }
}
