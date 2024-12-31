<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\WeightLog;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y/m/d'),
            'weight' => $this->faker->randomFloat(1, 40, 100),
            'calories' => $this->faker->numberBetween(1000, 3000),
            'exercise_time' => $this->faker->time('H:i:s'),
            'exercise_content' => $this->faker->sentence(),
        ];
    }

    public function forUser(User $user)
    {
        return $this->state(function (array $attributes) use ($user) {
            return [
                'user_id' => $user->id,
            ];
        });
    }
}
