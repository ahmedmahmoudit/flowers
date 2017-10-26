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
            'sku'               => 'required|unique:products,sku',
            'name_ar'           => 'required',
            'name_en'           => 'required',
            'height'            => 'required',
            'width'             => 'required',
            'active'            => 'required',
            'price'             => 'required|numeric',
            'description_en'    => 'required',
            'description_ar'    => 'required',
            'main_image'        => 'image|mimes:jpg,jpeg,png|dimensions:min_width=640,min_height=640,max_width:3000,max_height:3000',
            'qty'               => 'required|numeric',
            'images.*' => 'image|mimes:jpg,jpeg,png|dimensions:min_width=640,min_height=640,max_width:3000,max_height:3000',
//            'delivery_times' => 'required|array',
            'categories' => 'required|array'
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
