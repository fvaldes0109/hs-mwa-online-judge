<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'language_id' => $this->faker->numberBetween(1, 2),
            'problem_id' => $this->faker->numberBetween(1, 10),
            'accepted' => $this->faker->boolean(),
            'code' => $this->faker->text(),
        ];
    }
}