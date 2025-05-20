{{-- resources/views/layouts/kuu.blade.php --}}
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'くぅー（kuuー）')</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Poppins&display=swap" rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('styles')
</head>
<body>
    {{-- ローディング画面 --}}
    <div id="loading-screen">
        <div class="kuu-animation">
            <span class="char">く</span><span class="char">ぅ</span><span class="char">ー</span><span class="char">だ</span><span class="char">ね</span>
        </div>
    </div>

    {{-- ヘッダー --}}
    @include('partials.header')

    {{-- メイン --}}
    <main class="main-content">
        @yield('content')
    </main>

    {{-- フッター --}}
    @include('partials.footer')

    {{-- JavaScript --}}
    @include('partials.scripts')

    {{-- 各ページ固有のスクリプト --}}
    @stack('scripts')
</body>
</html>