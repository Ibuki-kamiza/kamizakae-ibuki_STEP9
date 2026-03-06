<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Test;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('test')
            ->where('user_id', auth()->id())
            ->get();

        return view('user.cart.index', compact('carts'));
    }

    public function store(Test $test)
    {
        if ($test->user_id == auth()->id()) {
            return redirect()->back()->with('error', '自分の商品はカートに追加できません。');
        }

        $cart = Cart::where('user_id', auth()->id())
            ->where('test_id', $test->id)
            ->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'test_id' => $test->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'カートに追加しました。');
    }

    public function destroy($id)
    {
        $cart = Cart::where('user_id', auth()->id())->findOrFail($id);
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'カートから削除しました。');
    }
}