<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepositoryInterface;
use App\User;

class ProfileController extends Controller
{

    private $userModel;

    /**
     * UserController constructor.
     *
     * @param User $userModel
     * @internal param UserRepositoryInterface $user
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \Auth::user();
        return view('profile.index', ['user' => $user]);
    }

    public function edit()
    {
        dd('edit');
    }

    public function getOrders()
    {
        dd('orders');
    }

    public function getFavorites()
    {
        dd('favorites');
    }

    public function getLogout()
    {
        auth()->logout();
        return redirect()->back();
    }

}
