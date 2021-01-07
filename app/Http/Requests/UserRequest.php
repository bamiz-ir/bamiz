<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'email' => 'required|unique:users',
                'password' => 'required|same:rep_password',
                'username' => 'required|unique:users',
                'profile_photo_path' => 'mimes:jpeg,png,bmp,jpg',
                'phone' => 'required|max:11|unique:users'
            ];
        }

        return [
            'email' => 'required',
            'username' => 'required',
            'password' => 'same:rep_password',
            'profile_photo_path' => 'mimes:jpeg,png,bmp,jpg',
            'phone' => 'required|max:11'
        ];

    }
}
