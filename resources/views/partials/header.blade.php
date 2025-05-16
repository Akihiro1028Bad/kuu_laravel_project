{{-- resources/views/partials/header.blade.php --}}
<header class="site-header">
    <div class="header-container">
        <div class="site-logo">
            <a href="{{route('index')}}">くぅー</a>
        </div>
        <button class="menu-toggle" id="menu-toggle" aria-label="メニューを開閉する">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>

<nav class="fullscreen-nav" id="fullscreen-nav">
    <button class="close-nav-btn" id="close-nav-btn" aria-label="メニューを閉じる">
        <i class="fas fa-times"></i>
    </button>
    <ul class="nav-links">
        <li><a href="{{route('kuuDocument_index')}}">ドキュメント</a></li>
        <li><a href="{{route('kuuButton_index')}}">くぅーする</a></li>
        <li><a href="#">ランキング</a></li>
        @auth
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">ログイン</a></li>
            <li><a href="{{ route('register') }}">新規登録</a></li>
        @endauth
    </ul>
</nav>
