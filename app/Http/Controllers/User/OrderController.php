<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.test')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.orders.index', compact('orders'));
    }
}