<?php

namespace Database\Factories;

use App\Models\Policy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Policy>
 */
class PolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4) . ' Policy',
            'description' => $this->faker->paragraphs(3, true),
            'version' => '1.' . $this->faker->numberBetween(0, 9),
            'status' => $this->faker->randomElement(['active', 'active', 'inactive']), // Active වීමේ සම්භාවිතාව වැඩියි
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
