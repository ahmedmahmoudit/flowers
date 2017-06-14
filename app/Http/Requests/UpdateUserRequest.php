<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateUserRequest extends FormRequest
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
        if($request->input('role') == '2')
        {
            return [
                'name'  => 'required',
                'email' => 'required|email',
                'role'  => 'required',
                'store' => 'required',
            ];
        }

        return [
            'name'  => 'required',
            'email' => 'required|email',
            'role'  => 'required',
        ];
    }
}
