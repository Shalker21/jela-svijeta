<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MealTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => rand(1, 40),
        ];
    }
}
