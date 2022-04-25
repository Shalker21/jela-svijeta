<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Meal extends Model
{
    use HasFactory, SoftDeletes;

    public function translation()
    {
        return $this->hasOne(MealTranslation::class)->where('lang', App::getLocale());
    }

    public function tags()
    {
        return $this->hasMany(MealTag::class);
    }

    public function ingredients()
    {
        return $this->hasMany(MealIngredient::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // filter by category id
    public function scopeMealsByCategory($query, $category_id)
    {
        if (!empty($category_id)) {
            return $query->where('category_id', $category_id);
        }
    }

    // filter by contained tags
    public function scopeMealsByTags($query, $tags)
    {
        if (!empty($tags)) {
            return $query->whereHas('tags', function ($q) use ($tags) {
                $q->whereIn('tag_id', (array) $tags);
            });
        }
    }

    // if diff time is set, get all meals, including soft deleted
    public function scopeMealsByDiffTime($query, $diff_time)
    {
        if (!empty($diff_time)) {
            $query->withTrashed(); // include soft deleted records to query
        }
    }

}
