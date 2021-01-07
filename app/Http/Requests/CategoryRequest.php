<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
               'title' => 'required',
               'slug' => "required|unique:categories|max:100",
               'chid' => 'required|numeric',
               'images' => 'required|mimes:jpg,jpeg,png,pmp'
           ];
       }

        return [
            'title' => 'required',
            'slug' => "required|max:100",
            'chid' => 'required|numeric',
            'images' => 'mimes:jpg,jpeg,png,pmp'
        ];
    }
}
