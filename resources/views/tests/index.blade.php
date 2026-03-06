@extends('layouts.app')

@section('content')

<h2>商品一覧</h2>

<form method="GET">

<input type="text" name="name" placeholder="商品名を入力">

<input type="number" name="min_price" placeholder="最低価格">

〜

<input type="number" name="max_price" placeholder="最高価格">

<button type="submit">検索</button>

</form>

<br>

<table border="1" width="100%">

<tr>
<th>商品番号</th>
<th>商品名</th>
<th>商品説明</th>
<th>画像</th>
<th>料金(¥)</th>
<th></th>
</tr>

@foreach($tests as $test)

<tr>

<td>{{ $test->id }}</td>

<td>{{ $test->name }}</td>

<td>{{ $test->description }}</td>

<td>
<img src="{{ asset('storage/'.$test->image_path) }}" width="50">
</td>

<td>{{ $test->price }}</td>

<td>
<a href="{{ route('tests.show',$test) }}">
<button style="background:green;color:white;">詳細</button>
</a>
</td>

</tr>

@endforeach

</table>

@endsection