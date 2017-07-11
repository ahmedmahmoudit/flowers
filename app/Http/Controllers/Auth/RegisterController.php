<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => ['required',Rule::in(['1','3'])],
            'start_week_day' => 'required_if:role,==,1',
            'end_week_day' => 'required_if:role,==,1',
            'minimum_delivery_days' => 'required_if:role,==,1',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $storeData = [];

        if($data['role'] == 1) {
            $storeData = [
                'instagram_username' => $data['instagram_username'],

            ];
        }

        $commonData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'] //@todo:confirm rules
        ];

        if($data['role'] == 1) {
            $commonData = array_merge($commonData,$storeData);
        }

        $user = User::create($commonData);

//        if($user) {
//            $user->store()->create([
//                'start_week_day' => $data['start_week_day'],
//                'end_week_day' => $data['end_week_day'],
//                'minimum_delivery_days' => $data['minimum_delivery_days'],
//            ]);
//        }
//        dd($user);

        return User::create($commonData);
    }

}
