<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Cytech EC</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<header class="header">

    <div class="header-left">
        <h2>Cytech EC</h2>
    </div>

    <div class="header-right">

        <a href="{{ route('home') }}">Home</a>

        <a href="{{ route('mypage') }}">マイページ</a>

        <span>
            ログインユーザー:
            {{ Auth::user()->display_name ?? 'TTUU' }}
        </span>

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button class="logout-btn">ログアウト</button>
        </form>

    </div>

</header>


<main class="main">

    @yield('content')

</main>


<footer class="footer">

    <div class="footer-contact">
        <a class="contact-btn" href="{{ route('contact') }}">お問い合わせ</a>
    </div>

    <div class="footer-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('mypage') }}">マイページ</a>
    </div>

    <div class="copyright">
        © 2024 Company, Inc
    </div>

</footer>

</body>
</html>