<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // mass assignment is disabled when seeding db
        Category::factory()
        ->count(10)
        ->has(
            CategoryTranslation::factory()
                    ->count(1)
                    ->state(function (array $attributes, Category $category) {
                        return [
                            'category_id' => $category->id,
                            'title' => 'Naslov kategorije '.$category->id.' na HRV jeziku',
                            'slug' => 'kategorija-'.$category->id,
                            'lang' => 'hr',
                        ];
                    })
        , 'translation')
        ->has(
            CategoryTranslation::factory()
                    ->count(1)
                    ->state(function (array $attributes, Category $category) {
                        return [
                            'category_id' => $category->id,
                            'title' => 'Category title '.$category->id.' is on ENG language',
                            'slug' => 'category-'.$category->id,
                            'lang' => 'en',
                        ];
                    })
        , 'translation')
        ->create();
    }
}
