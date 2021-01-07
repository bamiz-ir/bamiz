<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CenterRequest extends FormRequest
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
       if ($this->method() == 'POST')
       {
           return [
               'name' => 'required',
               'slug' => 'required|unique:centers',
               'state_id' => 'required|numeric|exists:states,id',
               'category_id' => 'required|numeric|exists:categories,id',
               'city_id' => 'required|numeric|exists:cities,id',
               'chairs_people_count' => 'required|numeric',
               'description' => 'required|max:250',
               'images' => 'required|mimes:jpg,jpeg,png,bmp',
           ];
       }

        return [
            'name' => 'required',
            'slug' => 'required',
            'state_id' => 'required|numeric|exists:states,id',
            'category_id' => 'required|numeric|exists:categories,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'chairs_people_count' => 'required|numeric',
            'description' => 'required|max:250',
            'images' => 'mimes:jpg,jpeg,png,bmp',
        ];
    }
}
