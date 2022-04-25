<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MealRequest;
use App\Http\Resources\MealCollection;
use App\Models\Meal;
use App\Models\Tag;
use Illuminate\Support\Facades\App;

class MealController extends Controller
{

    
    public function index(MealRequest $request)
    {
        $with = [];
        foreach (explode(',',$request['with']) as $key => $value) {
            array_push($with, $value.'.translation');
        }

        App::setLocale($request['lang']);

        $meals = Meal::with($with)
                    ->mealsByTags($request['tags'])
                    ->mealsByCategory($request['category'])
                    ->paginate($request['per_page']);

        return new MealCollection($meals);
    }
}
