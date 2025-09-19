<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageUrl = "https://picsum.photos/id/".rand(1, 1000)."/200/300";
        return [
            'user_id' => User::factory(),
            'name'=> fake()->name,
            'logo'=> $imageUrl,
        ];
    }
}
