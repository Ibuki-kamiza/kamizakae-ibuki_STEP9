<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $carts = Cart::with('test')
            ->where('user_id', auth()->id())
            ->get();

        return view('user.purchase.index', compact('carts'));
    }

    public function store()
    {
        $carts = Cart::with('test')
            ->where('user_id', auth()->id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'カートが空です。');
        }

        DB::transaction(function () use ($carts) {
            $totalPrice = 0;

            foreach ($carts as $cart) {
                $totalPrice += $cart->test->price * $cart->quantity;
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'total_price' => $totalPrice,
            ]);

            foreach ($carts as $cart) {
                if ($cart->test->stock < $cart->quantity) {
                    abort(400, '在庫が不足しています。');
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'test_id' => $cart->test->id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->test->price,
                ]);

                $cart->test->stock -= $cart->quantity;
                $cart->test->save();
            }

            Cart::where('user_id', auth()->id())->delete();
        });

        return redirect()->route('orders.index')->with('success', '購入が完了しました。');
    }
}