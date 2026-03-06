<h1>出品商品編集</h1>

@if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form action="{{ route('tests.update', $test) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div>
    <label>商品名</label><br>
    <input type="text" name="name" value="{{ old('name', $test->name) }}">
  </div>

  <div>
    <label>価格</label><br>
    <input type="number" name="price" value="{{ old('price', $test->price) }}">
  </div>

  <div>
    <label>商品説明</label><br>
    <textarea name="description">{{ old('description', $test->description) }}</textarea>
  </div>

  <div>
    <label>在庫数</label><br>
    <input type="number" name="stock" value="{{ old('stock', $test->stock) }}">
  </div>

  <div>
    <label>商品画像（差し替え）</label><br>
    <input type="file" name="image">
    @if ($test->image_path)
      <p>現在：</p>
      <img src="{{ asset('storage/' . $test->image_path) }}" width="120">
    @endif
  </div>

  <button type="submit">更新</button>
  <a href="{{ route('tests.show', $test) }}">戻る</a>
</form>
