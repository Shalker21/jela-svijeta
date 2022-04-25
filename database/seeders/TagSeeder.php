<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()
        ->count(40)
        ->has(
            TagTranslation::factory()
                    ->count(1)
                    ->state(function (array $attributes, Tag $tag) {
                        return [
                            'tag_id' => $tag->id,
                            'title' => 'Naslov taga '.$tag->id.' na HRV jeziku',
                            'slug' => 'tag-'.$tag->id,
                            'lang' => 'hr',
                        ];
                    })
        , 'translation')
        ->has(
            TagTranslation::factory()
                    ->count(1)
                    ->state(function (array $attributes, Tag $tag) {
                        return [
                            'tag_id' => $tag->id,
                            'title' => 'tag title '.$tag->id.' is on ENG language',
                            'slug' => 'tag-'.$tag->id,
                            'lang' => 'en',
                        ];
                    })
        , 'translation')
        ->create();
    }
}
