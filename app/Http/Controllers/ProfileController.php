<?php

namespace App\Http\Controllers;

use App\Core\Cart\Cart;
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
     * @var Cart
     */
    private $cart;

    /**
     * UserController constructor.
     *
     * @param User $userModel
     * @param Order $orderModel
     * @param Cart $cart
     * @internal param UserRepositoryInterface $user
     */
    public function __construct(User $userModel,Order $orderModel, Cart $cart)
    {
        $this->middleware('auth');
        $this->userModel = $userModel;
        $this->orderModel = $orderModel;
        $this->cart = $cart;
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

        $orders = $this->orderModel->has('detailExcerpt.product.detail')->where('user_id',$user->id)->get();

//        $user->load('orders.detailExcerpt.product.detail');
        return view('profile.orders', compact('user','orders'));
    }

    public function getOrderDetail($invoiceID)
    {
        $user = \Auth::user();
        $order = $this->orderModel
            ->has('orderDetails.product.detail')
            ->with('orderDetails.product.detail')->where('invoice_id',$invoiceID)->first();

        if(!$order) {
            return redirect()->back()->with('warning',__('Unknown Order'));
        }

        return view('profile.order_detail',compact('user','order'));

    }

    public function getFavorites()
    {
        $user = \Auth::user();
        $user->load('productLikes');
        $cartItems = $this->cart->getItems();
        return view('profile.favorites', ['user' => $user,'cartItems'=>$cartItems]);
    }

    public function getLogout()
    {
        auth()->logout();
        return redirect()->back();
    }

}
