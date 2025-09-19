<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jobTitle = fake()->jobTitle;
        return [
            'employer_id' => Employer::factory(),
            'title' => $jobTitle,
            'slug' => Str::slug($jobTitle),
            'gambar' => 'https://picsum.photos/200',
            'description' => fake()->paragraph,
            'salary' => fake()->randomElement(['40,000', '60,000', '80,000']),
            'location' => fake()->city,
            'schedule' => fake()->randomElement(['Full-time', 'Part-time']),
            'url' => fake()->url,
            'featured' => fake()->boolean(20)
        ];
    }
}
