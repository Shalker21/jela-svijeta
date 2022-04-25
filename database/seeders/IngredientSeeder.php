<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\IngredientTranslation;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::factory()
        ->count(40)
        ->has(
            IngredientTranslation::factory()
                    ->count(1)
                    ->state(function (array $attributes, Ingredient $ingredient) {
                        return [
                            'ingredient_id' => $ingredient->id,
                            'title' => 'Naslov sastojka '.$ingredient->id.' na HRV jeziku',
                            'slug' => 'sastojak-'.$ingredient->id,
                            'lang' => 'hr',
                        ];
                    })
        , 'translation')
        ->has(
            IngredientTranslation::factory()
                    ->count(1)
                    ->state(function (array $attributes, Ingredient $ingredient) {
                        return [
                            'ingredient_id' => $ingredient->id,
                            'title' => 'ingredient title '.$ingredient->id.' is on ENG language',
                            'slug' => 'ingredient-'.$ingredient->id,
                            'lang' => 'en',
                        ];
                    })
        , 'translation')
        ->create();
    }
}
