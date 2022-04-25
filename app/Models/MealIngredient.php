<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class MealIngredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'meal_ingredient';

    public function translation()
    {
        return $this->hasOne(IngredientTranslation::class, 'ingredient_id', 'ingredient_id')->where('lang', App::getLocale());; 
    }
}
