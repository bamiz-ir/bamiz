<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
                "slug" => "required|unique:articles",
                "short_text" => "required|max:255",
                "body" => "required",
                "tags" => "required",
                "keywords" => "required",
                "status" => "required",
                "center_id" => "required",
                "images" => "required|mimes:jpeg,png,bmp,jpg",
            ];
        }

        return [
            "title" => "required",
            "slug" => "required",
            "short_text" => "required|max:255",
            "body" => "required",
            "tags" => "required",
            "keywords" => "required",
            "status" => "required",
            "center_id" => "required",
            "images" => "mimes:jpeg,png,bmp,jpg"
        ];
    }
}
