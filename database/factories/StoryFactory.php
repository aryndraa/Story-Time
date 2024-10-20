<?php

namespace Database\Factories;

use App\Models\StoryCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'             => fake()->title(),
            'content'           => fake()->text(),
            'user_id'           => User::inRandomOrder()->first()->id,
            'story_category_id' => StoryCategory::inRandomOrder()->first()->id,
        ];
    }
}
