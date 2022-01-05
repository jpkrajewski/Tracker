<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(array ('recent','finished')),
        ];
    }
}
