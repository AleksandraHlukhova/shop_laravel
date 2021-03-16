<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * show admin orders
     **/
    public function orders(Type $var = null)
    {
        $orders = Order::where('status', 1)->get();
        return view('admin.orders', compact('orders'));
    }
}
