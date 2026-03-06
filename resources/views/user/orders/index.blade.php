@extends('layouts.app')

@section('content')
<h1>カート一覧</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>個数</th>
        <th>小計</th>
        <th></th>
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
            <td>
                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<h3>合計: ¥{{ $total }}</h3>

@if($carts->count() > 0)
    <a href="{{ route('purchase.index') }}">購入画面へ</a>
@endif
@endsection