<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use HasFactory;

    public function translation()
    {
        return $this->hasOne(CategoryTranslation::class)->where('lang', App::getLocale());
    }
}
