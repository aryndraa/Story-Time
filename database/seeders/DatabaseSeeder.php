<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ProfileUserSeeder::class,
            StorySeeder::class,
            FileSeeder::class,
            BookmarkSeeder::class,
            StoryViewSeeder::class,
        ]);
    }
}
