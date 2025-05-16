@extends('layouts.kuu')

@section('title', 'くぅー（kuuー） - ドキュメント') {{-- タイトルを少し具体的に --}}

@section('content')
<div class="container"> {{-- コンテナとメインコンテンツラッパーを追加 --}}

    <section id="about" class="section fade-in-section"> {{-- CSSのクラスを適用 --}}
        <h2 class=" fade-in-section">📌 このドキュメントについて</h2>
        <p>本ドキュメントは、日本語の感嘆詞「くぅー（kuuー）」の意味・用法・発音・文化的背景について解説します。日常会話やSNSなどで使われるこの表現を、適切に理解し活用できるようにすることを目的としています。</p>
        <ul class="styled-list"> {{-- CSSのクラスを確認 (既存) --}}
            <li><i class="fas fa-check-circle"></i> 「くぅー」の基本的な意味と使い方</li>
            <li><i class="fas fa-check-circle"></i> 発音のバリエーションとニュアンスの違い</li>
            <li><i class="fas fa-check-circle"></i> 文化的な背景や使用シーン</li>
        </ul>
    </section>

    <section id="definition" class="section fade-in-section"> {{-- CSSのクラスを適用 --}}
        <h2>🎯 1. 定義</h2>
        <p>「くぅー（kuuー）」は、日本語の感嘆詞の一種であり、以下のような感情を表現する際に使われる。</p>
        <ul class="styled-list"> {{-- CSSのクラスを確認 (既存) --}}
            <li><i class="fas fa-hand-peace"></i> リラックス感・満足感</li>
            <li><i class="fas fa-exclamation-triangle"></i> 驚き・感動</li>
        </ul>
        <p>発音時に母音を引き伸ばすことで、感情の度合いを強調することができます。</p>
    </section>

    <section id="grammar" class="section fade-in-section"> {{-- CSSのクラスを適用 --}}
        <h2>📝 2. 文法情報</h2>
        <div class="subsection">
            <h3>📌 2.1. 品詞分類</h3>
            <p>感動詞（interjection）</p>
        </div>
        <div class="subsection">
            <h3>🔊 2.2. 発音</h3>
            <ul class="styled-list"> {{-- CSSのクラスを確認 (既存) --}}
                <li>
                    <i class="fas fa-bullhorn"></i> IPA表記：/kuː/
                    {{-- ボタンにCSSクラスを適用 --}}
                    <button id="play-pronunciation" class="btn btn-secondary" style="padding: 0.3rem 0.8rem; font-size: 0.85rem; margin-left: 0.5rem;">
                        <i class="fas fa-play-circle"></i>発音を聞く
                    </button>
                </li>
                <li><i class="fas fa-spell-check"></i> カタカナ表記：クゥー</li>
                <li><i class="fas fa-info-circle"></i> 音声的特徴：発音の長さで感情が変化</li>
            </ul>
        </div>
        {{-- 音声ファイルはレイアウトに影響しないためそのまま --}}
        <audio id="pronunciation-audio" src="{{ asset('audio/kuu7.mp3') }}" preload="auto"></audio>
    </section>

    <section id="meaning" class="section fade-in-section"> {{-- CSSのクラスを適用 --}}
        <h2 class="fade-in-section">💬 3. 意味と用法</h2>

        {{-- 各サブセクション --}}
        <div class="subsection margin-bottom-md fade-in-section"> {{-- 下マージンを追加して間隔調整 --}}
            <h3><i class="fas fa-wind" style="color: var(--secondary-color);"></i> 3.1. リラックス感・満足感の表現</h3> {{-- アイコン追加例 --}}
            <p>使用者が快適さや満足感を得た際に自然に発せられる。</p>
            <p class="example-title" style="font-weight: 600; margin-top: 1rem; color: var(--primary-color);">✅ 例文</p>
            <ul class="styled-list"> {{-- CSSのクラスを確認 (既存) --}}
                <li><i class="fas fa-hot-tub"></i> 「くぅー、温泉はやっぱり最高だな。」（温泉でリラックス）</li>
                <li><i class="fas fa-coffee"></i> 「くぅー、コーヒーが体に染みる…」（美味しいコーヒーを飲んで安らぐ）</li>
                <li><i class="fas fa-beer"></i> 「くぅー、仕事終わりのビールがたまらん！」（ビールの爽快感を楽しむ）</li>
            </ul>
        </div>

        <div class="subsection margin-bottom-md fade-in-section"> {{-- 下マージンを追加 --}}
            <h3><i class="fas fa-star" style="color: var(--accent-color);"></i> 3.2. 驚き・感動の表現</h3> {{-- アイコン追加例 --}}
            <p>驚きや感動を伴う場面で使用される。</p>
            <p class="example-title" style="font-weight: 600; margin-top: 1rem; color: var(--primary-color);">✅ 例文</p>
            <ul class="styled-list"> {{-- CSSのクラスを確認 (既存) --}}
                <li><i class="fas fa-robot"></i> 「くぅー、これはすごい発明だ！」（驚きや感心）</li>
                <li><i class="fas fa-gamepad"></i> 「くぅー、これはやられた！」（相手の巧妙さに驚く）</li>
            </ul>
        </div>

        <div class="subsection margin-bottom-md fade-in-section"> {{-- 下マージンを追加 --}}
            <h3><i class="fas fa-theater-masks" style="color: var(--primary-color);"></i> 3.3. 「くぅー」のみで感情を伝える（上級者向け）</h3> {{-- アイコン追加例 --}}
            <p>言葉を省略して「くぅー」だけで感情を表現することも可能。</p>
            <p class="example-title" style="font-weight: 600; margin-top: 1rem; color: var(--primary-color);">✅ 例文</p>
            <ul class="styled-list"> {{-- CSSのクラスを確認 (既存) --}}
                <li><i class="fas fa-wine-glass"></i> （ビールを一口飲んで）「くぅー」</li>
                <li><i class="fas fa-cloud-sun"></i> （温泉につかって）「くぅ～」</li>
                <li><i class="fas fa-futbol"></i> （逆転ゴール）「くぅーっ！」</li>
            </ul>
        </div>

        <div class="subsection margin-bottom-md fade-in-section"> {{-- 下マージンを追加 --}}
            <h3><i class="fas fa-medal" style="color: #FFD700;"></i> 3.4. 「くぅー」を強調する表現（プロフェッショナル向け）</h3> {{-- アイコン追加例 --}}
            <p>「くぅー」の前に言葉をつけることで、感情の強調が可能になる。</p>
            <p class="example-title" style="font-weight: 600; margin-top: 1rem; color: var(--primary-color);">✅ 例文</p>
            <ul class="styled-list"> {{-- CSSのクラスを確認 (既存) --}}
                <li><i class="fas fa-trophy"></i> 「これこそが、くぅーっ！」</li>
                <li><i class="fas fa-utensils"></i> 「まさに…くぅーっ！」</li>
                <li><i class="fas fa-mountain"></i> 「これはまちがいなく…くぅーっ！」</li>
            </ul>
        </div>

        <div class="subsection margin-bottom-md fade-in-section"> {{-- 下マージンを追加 --}}
            <h3><i class="fas fa-user-tie" style="color: var(--dark-gray);"></i> 3.5. 「くぅー」をフォーマルにする表現（ビジネスマン向け）</h3> {{-- アイコン追加例 --}}
            <p>「です」や「ですね」を付け加えることで、フォーマルな場面でも適用しやすい表現にできる。</p>
            <p class="example-title" style="font-weight: 600; margin-top: 1rem; color: var(--primary-color);">✅ 例文</p>
            <ul class="styled-list"> {{-- CSSのクラスを確認 (既存) --}}
                <li><i class="fas fa-sun"></i> 「くぅーですよ…！」</li>
                <li><i class="fas fa-smile-beam"></i> 「これはまさに、くぅーです。」</li>
                <li><i class="fas fa-thumbs-up"></i> 「これはくぅーですね。」</li>
            </ul>
        </div>
    </section>

    <section id="summary" class="section fade-in-section"> {{-- CSSのクラスを適用 --}}
        <h2 class="fade-in-section">🎊 まとめ</h2>
        <p class=" fade-in-section">「くぅー」は、リラックス感や驚きを伝える非常に便利な表現です。多様なニュアンスを持ち、様々な場面で活用できます。ぜひマスターして、表現豊かなコミュニケーションに役立ててください。</p> {{-- まとめを少し追記 --}}
    </section>

    {{-- 複数の音声ファイルは機能に関わる部分なので変更しない --}}
    <audio id="kuuSound" preload="auto">
        <source src="{{ asset('audio/kuu1.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu2.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu3.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu4.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu5.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu6.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu7.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu8.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu9.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu10.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu11.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu12.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu13.mp3') }}" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>

</div> {{-- .container .main-content の閉じタグ --}}
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        playPronunciationButton.addEventListener('click', function() {

        // 再生開始時の処理
        pronunciationAudio.onplay = function() {
            console.log("再生開始");
            // ここに再生開始時の処理を追加
            // ボタンを無効化し、テキストを「再生中」に変更
            playPronunciationButton.disabled = true;
            playPronunciationButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> 再生中...';
        };

        // 再生終了時の処理
        pronunciationAudio.onended = function() {
            console.log("再生終了");
            // ここに再生終了時の処理を追加
            playPronunciationButton.disabled = false;
            playPronunciationButton.innerHTML = '<i class="fas fa-play-circle"></i>発音を聞く';
        };
        pronunciationAudio.play();
        });
    });
</script>
@endpush