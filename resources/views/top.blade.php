@extends('layouts.kuu')

@section('title', 'くぅー（kuuー）')
@section('content')
    {{-- メインコンテンツ --}}
    <section class="hero-section">
        <div class="container">
            <div class="hero-icon-container">
                <i class="fas fa-hot-tub hero-icon"></i>
                <i class="fas fa-beer-mug-empty hero-icon"></i>
                <i class="fas fa-face-grin-stars hero-icon"></i>
            </div>
            <div class="hero-content fade-in-section">
                <h1>心がほどける、<br>あの「くぅー！」体験を。</h1>
                <p>日本語の奥深い感嘆詞「くぅー」の世界へ。<br>意味を知り、連打で楽しむ新感覚サイト。</p>
                <div class="hero-buttons">
                    <a href="{{route('kuuDocument_index')}}" class="btn btn-primary"><i class="fas fa-book-open"></i> ドキュメントを読む</a>
                    <a href="{{route('kuuButton_index')}}" class="btn btn-accent"><i class="fas fa-hand-pointer"></i> 今すぐ「くぅー」する</a>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-section padding-section">
        <div class="container">
            <h2 class="section-title fade-in-section">Kuu- の楽しみ方</h2>
            <div class="feature-cards-grid">
                <div class="feature-card fade-in-section">
                    <div class="card-icon-wrapper"><i class="fas fa-graduation-cap"></i></div>
                    <h3>深く知る</h3>
                    <p>意味、使い方、文化的背景まで。ドキュメントで「くぅー」をマスター。</p>
                    <a href="{{route('kuuDocument_index')}}" class="btn btn-secondary">詳しく見る <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="feature-card fade-in-section" style="transition-delay: 0.1s;">
                    <div class="card-icon-wrapper"><i class="fas fa-gamepad"></i></div>
                    <h3>連打で遊ぶ</h3>
                    <p>ボタンを叩いてレベルアップ！称号を集め、くぅー道を極めよう！</p>
                    <a href="{{route('kuuButton_index')}}" class="btn btn-secondary">遊びに行く <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="feature-card fade-in-section" style="transition-delay: 0.2s;">
                        <div class="card-icon-wrapper"><i class="fas fa-trophy"></i></div>
                    <h3>ランキングを競う</h3>
                    <p>全国の「くぅー」猛者と勝負！伝説の称号は誰の手に？</p>
                    <a href="#" class="btn btn-secondary">ランキングへ <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="ranking-highlight-section padding-section">
        <div class="container">
            <h2 class="section-title fade-in-section">最新 くぅーランキング</h2>
            <div class="ranking-highlight-container fade-in-section">
                {{-- ダミーデータ --}}
                <div class="ranking-item-highlight">
                    <div class="rank-number-highlight">1</div>
                    <div class="user-info-highlight">伝説のくぅーマスター</div>
                    <div class="kuu-count-highlight"><i class="fas fa-star"></i> 10000回</div>
                </div>
                <div class="ranking-item-highlight">
                    <div class="rank-number-highlight">2</div>
                    <div class="user-info-highlight">くぅーの求道者</div>
                    <div class="kuu-count-highlight"><i class="fas fa-star"></i> 8500回</div>
                </div>
                <div class="ranking-item-highlight">
                    <div class="rank-number-highlight">3</div>
                    <div class="user-info-highlight">一日三くぅーの人</div>
                    <div class="kuu-count-highlight"><i class="fas fa-star"></i> 7000回</div>
                </div>
            </div>
            <div class="text-center fade-in-section">
                <a href="#" class="btn btn-secondary">すべてのランキングを見る <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>

    <section class="login-prompt-section padding-section fade-in-section">
        <div class="container">
            <h4>くぅーする準備はOK？</h4>
            <p class="margin-bottom-md" style="color: var(--dark-gray);">アカウント登録で、連打やランキングに参加しよう！</p>
            <div class="prompt-buttons">
                <a href="{{ route('register') }}" class="btn btn-accent">新規登録はこちら</a>
                <a href="{{ route('login') }}" class="btn btn-secondary">ログインはこちら</a>
            </div>
        </div>
    </section>
@endsection