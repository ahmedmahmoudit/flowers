<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Store;
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
     * @var Country
     */
    private $countryModel;
    /**
     * @var Store
     */
    private $storeModel;

    /**
     * Create a new controller instance.
     *
     * @param Country $countryModel
     * @param Store $storeModel
     */
    public function __construct(Country $countryModel,Store $storeModel)
    {
        $this->middleware('guest');
        $this->countryModel = $countryModel;
        $this->storeModel = $storeModel;
    }

    public function showRegistrationForm()
    {
        $countries  = $this->countryModel->all();
        return view('auth.register',compact('countries'));
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

            'store_name_en' => 'required_if:role,==,1',
            'store_name_ar' => 'required_if:role,==,1',
            'store_email' => 'required_if:role,==,1',
            'store_phone' => 'required_if:role,==,1',
            'start_week_day' => 'required_if:role,==,1',
            'end_week_day' => 'required_if:role,==,1',
            'minimum_delivery_days' => 'required_if:role,==,1',
            'country_id' => 'required_if:role,==,1'
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

        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'] //@todo:confirm rules
        ];

        $user = User::create($userData);

        if($data['role'] == 1) {
            $this->storeModel->create([
                'name_en' => $data['store_name_en'],
                'name_ar' => $data['store_name_ar'],
                'email' => $data['store_email'],
                'phone' => $data['store_phone'],
                'start_week_day' => $data['start_week_day'],
                'end_week_day' => $data['end_week_day'],
                'minimum_delivery_days' => $data['minimum_delivery_days'],
                'instagram_username' => $data['instagram_username'],
                'user_id' => $user->id,
                'slug_en' => $data['store_name_en'],
                'slug_ar' => $data['store_name_ar'],
                'country_id' => $data['country_id'],
            ]);
        }

        return $user;
    }

}
