<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(0,4) != 0 ? rand(1,10) : null, // meal can have one category only and also don't need to have cat
        ];
    }
}
