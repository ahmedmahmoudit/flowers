<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateCouponRequest extends FormRequest
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
        if(Auth::user()->isManager())
        {
            return [
                'stores'            => 'required',
                'percentage'        => 'required|numeric',
                'code'              => 'required|unique:coupons,code',
                'minimum_charge'    => 'required|numeric',
                'expiry_date'          => 'required|Date',
                'quantity_left'        => 'numeric|required',
            ];
        }
        return [
            'percentage'        => 'required|numeric',
            'code'              => 'required|unique:coupons,code',
            'minimum_charge'    => 'required|numeric',
            'expiry_date'          => 'required|Date',
            'quantity_left'        => 'numeric|required',
        ];
    }
}
