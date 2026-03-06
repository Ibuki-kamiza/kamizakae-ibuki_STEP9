@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h1>ログイン</h1>

    <form action="{{ route('login') }}" method="POST" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="auth-btn">ログイン</button>
    </form>

    <p class="auth-link">
        アカウントをお持ちでない方は
        <a href="{{ route('register') }}">新規登録</a>
    </p>
</div>
@endsection