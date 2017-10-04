<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
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
            'country_id'=> 'required',
            'name_en'   => 'required',
            'name_ar'   => 'required',
            'email'     => 'nullable|email',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|dimensions:min_width=400,min_height=400,max_width:3000,max_height:3000',
        ];
    }
}
