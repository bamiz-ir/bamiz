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
            'center_id' => 'required|numeric|exists:centers,id',
            'user_id' => 'required|numeric|exists:users,id',
            'date' => 'required|date|date_format:Y-m-d|after:yesterday',
            'time' => 'required|max:5',
            'price' => 'required|numeric',
            'guest_count' => 'required|numeric',
            'chair_id' => 'numeric',
            'product_id.*' => 'numeric|exists:products,id',
            'option_id.*' => 'numeric|exists:options,id'
        ];
    }
}
