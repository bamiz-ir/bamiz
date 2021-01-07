<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorktimeRequest extends FormRequest
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
            'week_days' => 'required',
            'fromHour' => 'required|max:2',
            'toHour' => 'required|max:2',
        ];
    }
}
