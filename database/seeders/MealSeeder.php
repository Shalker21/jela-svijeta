<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use App\Models\Meal;
use App\Models\MealIngredient;
use App\Models\MealTag;
use App\Models\MealTranslation;
use App\Models\Tag;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Meal::factory()
        ->count(60)
        ->has(
            MealTranslation::factory()
                    ->count(1)
                    ->state(function (array $attributes, Meal $meal) {
                        return [
                            'meal_id' => $meal->id,
                            'title' => 'Naslov jela '.$meal->id.' na HRV jeziku',
                            'slug' => 'jelo-'.$meal->id,
                            'description' => 'Opis jela '.$meal->id.' na HRV jeziku',
                            'status' => 'Stvoreno',
                            'lang' => 'hr',
                        ];
                    })
        , 'translation')
        ->has(
            MealTranslation::factory()
                    ->count(1)
                    ->state(function (array $attributes, Meal $meal) {
                        return [
                            'meal_id' => $meal->id,
                            'title' => 'Meal title '.$meal->id.' is on ENG language',
                            'description' => 'Meal description '.$meal->id.' is on ENG language',
                            'slug' => 'meal-'.$meal->id,
                            'status' => 'Created',
                            'lang' => 'en',
                        ];
                    })
        , 'translation')
        /*->has(
            MealIngredient::factory()
            ->count(rand(1,3)) // FIXME: always getting 3 
            ->state(function (array $attributes, Meal $meal) use ($ingredient) {
                return [
                    'meal_id' => $meal->id,
                    'ingredient_id' => $ingredient->random()
                ];
            })
        , 'ingredients')*/
        ->create()->each(function ($meal) {
            MealIngredient::factory()
            ->count(rand(1,6)) 
            ->create([
                'meal_id' => $meal->id,
                //'ingredient_id' => rand(1,40),
            ]);

            MealTag::factory()
            ->count(rand(1,3)) 
            ->create([
                'meal_id' => $meal->id,
                //'tag_id' => rand(1,40),
            ]);
        });

    }
}
