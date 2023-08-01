<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Task;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $desc_type = array_rand(['W', 'S']); //word or sentence

        return [
            'user_id' => User::factory(),
            'name' => $desc_type = 'W' ? $this->faker->word : $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'completed' => array_rand([0, 1]),
        ];
    }
}
