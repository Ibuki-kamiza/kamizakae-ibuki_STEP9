@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h1>新規登録</h1>

    <form action="{{ route('register') }}" method="POST" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="display_name">ユーザー名（ホームに表示する名前）</label>
            <input type="text" name="display_name" id="display_name" value="{{ old('display_name') }}" required>
            @error('display_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="last_name">名前（漢字）</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
            @error('last_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="first_name">名前（漢字）</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
            @error('first_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="last_name_kana">名前（カナ）</label>
            <input type="text" name="last_name_kana" id="last_name_kana" value="{{ old('last_name_kana') }}" required>
            @error('last_name_kana')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="first_name_kana">名前（カナ）</label>
            <input type="text" name="first_name_kana" id="first_name_kana" value="{{ old('first_name_kana') }}" required>
            @error('first_name_kana')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

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

        <div class="form-group">
            <label for="password_confirmation">パスワード再確認</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit" class="auth-btn">新規登録</button>
    </form>

    <p class="auth-link">
        すでにアカウントをお持ちの方は
        <a href="{{ route('login') }}">ログイン</a>
    </p>
</div>
@endsection