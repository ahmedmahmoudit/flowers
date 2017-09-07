<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        if (Auth::attempt(['email' => $email, 'password' => $password],$remember)) {
            //if Admin

            if(Auth::user()->isManager()){
                return redirect('manager/dashboard');
            }

            if(Auth::user()->isStoreAdmin()) {
                //if Has store
                if(Auth::user()->store) {
                    return redirect('admin/dashboard');
                }
            }

            return redirect()->intended('/');
        }

        return redirect()->route('login')->with('error',__("Email and Password doesn't match"));
    }

}
