<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function managerDashboard()
    {
        $ordersD = Order::daily()->count();
        $ordersM = Order::monthly()->count();
        $ordersY = Order::yearly()->count();

        $storesD = Store::daily()->count();
        $storesM = Store::monthly()->count();
        $storesY = Store::yearly()->count();

        $usersD  = User::daily()->count();
        $usersM  = User::monthly()->count();
        $usersY  = User::yearly()->count();

        $productsD = Product::daily()->count();
        $productsM = Product::monthly()->count();
        $productsY = Product::yearly()->count();

        return view('backend.manager.dashboard', compact(
            'ordersD', 'ordersM', 'ordersY',
            'storesD', 'storesM', 'storesY',
            'usersD', 'usersM', 'usersY',
            'productsD', 'productsM', 'productsY'
        ));
    }

    public function adminDashboard()
    {
        $store = Store::find(Auth::user()->store->id);

        $ordersD = $store->orders()->daily()->count();
        $ordersM = $store->orders()->monthly()->count();
        $ordersY = $store->orders()->yearly()->count();

        $productsD = Product::byStore()->daily()->count();
        $productsM = Product::byStore()->monthly()->count();
        $productsY = Product::byStore()->yearly()->count();

        return view('backend.admin.dashboard', compact(
            'ordersD', 'ordersM', 'ordersY',
            'productsD', 'productsM', 'productsY'
        ));
    }
}
