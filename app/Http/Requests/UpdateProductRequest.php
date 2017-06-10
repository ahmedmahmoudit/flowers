<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateProductRequest extends FormRequest
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
        if($request->has('is_sale'))
        {
            return [
                'sku'               => 'required',
                'store'             => 'required',
                'name_ar'           => 'required',
                'name_en'           => 'required',
                'active'            => 'required',
                'price'             => 'required',
                'weight'            => 'required',
                'main_image'        => 'mimes:jpeg,jpg,png,gif|max:3000',
                'qty'               => 'required',
                'sale_price'        => 'required',
                'start_sale_date'   => 'required',
                'end_sale_date'     => 'required',
            ];
        }
        return [
            'sku'               => 'required',
            'store'             => 'required',
            'name_ar'           => 'required',
            'name_en'           => 'required',
            'active'            => 'required',
            'price'             => 'required',
            'weight'            => 'required',
            'main_image'        => 'mimes:jpeg,jpg,png,gif|max:3000',
            'qty'               => 'required',
        ];
    }
}
