<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::factory()->count(2)->state(new Sequence(
            [
                'title' => 'English',
                'lang' => 'en',
            ],
            [
                'title' => 'Hrvatski',
                'lang' => 'hr',
            ],
        ))->create();
    }
}
