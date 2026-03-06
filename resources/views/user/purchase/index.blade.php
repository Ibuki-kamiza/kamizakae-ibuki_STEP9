@extends('layouts.app')

@section('content')
<h1>購入確認</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>個数</th>
        <th>小計</th>
    </tr>

    @php $total = 0; @endphp

    @foreach($carts as $cart)
        @php
            $subtotal = $cart->test->price * $cart->quantity;
            $total += $subtotal;
        @endphp
        <tr>
            <td>{{ $cart->test->name }}</td>
            <td>¥{{ $cart->test->price }}</td>
            <td>{{ $cart->quantity }}</td>
            <td>¥{{ $subtotal }}</td>
        </tr>
    @endforeach
</table>

<h3>合計: ¥{{ $total }}</h3>

<form action="{{ route('purchase.store') }}" method="POST">
    @csrf
    <button type="submit">購入する</button>
</form>

<a href="{{ route('cart.index') }}">戻る</a>
@endsection