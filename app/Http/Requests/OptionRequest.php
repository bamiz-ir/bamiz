<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
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
                "title" => "required",
                "slug" => "required|unique:options",
                "price" => "required|numeric",
                "description" => "required|max:250",
                "images" => "required|mimes:jpg,jpeg,bmp,png",
                "center_id" => "required|exists:centers,id",
            ];
        }
        return [
            "title" => "required",
            "slug" => 'required',
            "price" => "required|numeric",
            "description" => "required|max:250",
            "images" => "mimes:jpg,jpeg,bmp,png",
            "center_id" => "required|exists:centers,id",
        ];
    }
}
