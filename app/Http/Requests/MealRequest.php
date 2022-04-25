<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'per_page' => 'nullable|integer|min:1',
            'page' => 'nullable|integer|min:1',
            'tags' => 'nullable',
            'with' => 'nullable',
            'lang' => 'required|string|min:2',
            'diff_time' => 'nullable|integer|min:1'
        ];
    }

    
}
