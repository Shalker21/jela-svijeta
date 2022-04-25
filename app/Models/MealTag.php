<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class MealTag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'meal_tag';

    public function translation()
    {
        return $this->hasOne(TagTranslation::class, 'tag_id', 'tag_id')->where('lang', App::getLocale());
    }
}
