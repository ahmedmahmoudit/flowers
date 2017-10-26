<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreSettingsRequest extends FormRequest
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
            'name_en'   => 'required',
            'name_ar'   => 'required',
            'minimum_delivery_days'   => 'required',
            'start_week_day'   => 'required',
            'end_week_day'   => 'required',
            'phone'   => 'required',
            'second_email' => 'nullable|email',
            'email'     => 'required|email',
            'delivery_times' => 'array|required'
        ];
    }
}
