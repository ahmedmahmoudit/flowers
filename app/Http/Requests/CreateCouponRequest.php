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
                'code'              => 'required',
                'minimum_charge'    => 'required|numeric',
                'due_date'          => 'required|Date',
                'is_limited'        => 'required',
            ];
        }
        return [
            'percentage'        => 'required|numeric',
            'code'              => 'required',
            'minimum_charge'    => 'required|numeric',
            'due_date'          => 'required|Date',
            'is_limited'        => 'required',
        ];
    }
}
