<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateProductRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $validationRules = [
            'sku'               => 'required',
            'name_ar'           => 'required',
            'name_en'           => 'required',
            'active'            => 'required',
            'price'             => 'required',
            'weight'            => 'required',
            'description_en'    => 'required',
            'description_ar'    => 'required',
            'main_image'        => 'mimes:jpeg,jpg,png,gif|required|max:3000',
            'qty'               => 'required',
        ];

        if($request->has('is_sale'))
        {
            $validationRules['sale_price'] = 'required';
            $validationRules['start_sale_date'] = 'required|before:end_sale_date';
            $validationRules['end_sale_date'] = 'required|after:start_sale_date';
        }

        if(Auth::user()->isManager())
        {
            $validationRules['store'] = 'required';
        }

        return $validationRules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'start_sale_date.before' => 'Start Date Must be before End Date!',
            'end_sale_date.after'  => 'End Date Must be after Start Date!',
        ];
    }
}
