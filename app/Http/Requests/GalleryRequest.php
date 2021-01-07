<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
                "captions.*" => "required|mimes:jpeg,jpg,png,bmp",
                "center_id" => "required|numeric|exists:centers,id",
                "type" => "required|string",
            ];
        }

        return [
            "captions.*" => "mimes:jpeg,jpg,png,bmp",
            "center_id" => "required|numeric",
            "type" => "required|string",
        ];
    }
}
