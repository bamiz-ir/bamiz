<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'date' => 'required|date|date_format:Y-m-d|after:yesterday',
            'time' => 'required|max:5|numeric',
            'guest_count' => 'required|numeric',
            'product_id.*' => 'numeric|exists:products,id',
            'option_id.*' => 'numeric|exists:options,id'
        ];
    }
}
