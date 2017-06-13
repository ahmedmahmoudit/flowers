<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Order;
use App\Repositories\UserRepositoryInterface;
use App\User;

class ProfileController extends Controller
{

    private $userModel;
    /**
     * @var Order
     */
    private $orderModel;

    /**
     * UserController constructor.
     *
     * @param User $userModel
     * @param Order $orderModel
     * @internal param UserRepositoryInterface $user
     */
    public function __construct(User $userModel,Order $orderModel)
    {
        $this->userModel = $userModel;
        $this->middleware('auth');
        $this->orderModel = $orderModel;
    }

    public function index()
    {
        $user = \Auth::user();
        return view('profile.index', ['user' => $user]);
    }

    public function edit()
    {
        $user = \Auth::user();
        return view('profile.edit', ['user' => $user]);
    }

    public function getOrders()
    {
        $user = \Auth::user();
//        dd($user);
        return view('profile.orders', ['user' => $user]);
    }

    public function getOrderDetail($id)
    {
        $user = \Auth::user();
        $user->load('orders');
        $order = $user->orders()->where('id',$id)->first();

        if(!$order) {
            return redirect()->back()->with('warning',__('Unknown Order'));
        }

        return view('profile.order_detail',compact('user','order'));

    }

    public function getFavorites()
    {
        $user = \Auth::user();
        return view('profile.favorites', ['user' => $user]);
    }

    public function getLogout()
    {
        auth()->logout();
        return redirect()->back();
    }

}
