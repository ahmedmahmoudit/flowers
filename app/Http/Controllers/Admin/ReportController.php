<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Get sales view
     *
     * @return mixed
     */
    public function saleView()
    {
        $orders = [];

        return view('backend.manager.reports.sales', compact('orders'));
    }

    public function getSales(Request $request)
    {
        $attributes = $request->only(['from', 'to']);

        $orders = Order::where('order_status', '3')
            ->where('created_at','>=', $attributes['from'])
            ->where('created_at','<=', $attributes['to'])->get();

        return view('backend.manager.reports.sales', compact('orders'));
    }
}
