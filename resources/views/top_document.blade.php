<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>くぅー（kuuー）— 公式ドキュメント</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <div id="loading-screen">
        <div class="kuu-animation">
            <span class="char">く</span>
            <span class="char">ぅ</span>
            <span class="char">ー</span>
            <span class="char">だ</span>
            <span class="char">ね</span>
        </div>
    </div>

    <div id="level-up-popup" class="level-up-popup">
        <p id="level-up-message"></p>
    </div>

    <div class="container">
        <header>
            <h1>くぅー（kuuー）</h1>
            <p>公式ドキュメント</p>
        </header>

        <main>
            <section id="about" class="section">
                <h2>📌 このドキュメントについて</h2>
                <p>本ドキュメントは、日本語の感嘆詞「くぅー（kuuー）」の意味・用法・発音・文化的背景について解説します。日常会話やSNSなどで使われるこの表現を、適切に理解し活用できるようにすることを目的としています。</p>
                <ul class="styled-list">
                    <li><i class="fas fa-check-circle"></i> 「くぅー」の基本的な意味と使い方</li>
                    <li><i class="fas fa-check-circle"></i> 発音のバリエーションとニュアンスの違い</li>
                    <li><i class="fas fa-check-circle"></i> 文化的な背景や使用シーン</li>
                </ul>
            </section>

            <section id="definition" class="section">
                <h2>🎯 1. 定義</h2>
                <p>「くぅー（kuuー）」は、日本語の感嘆詞の一種であり、以下のような感情を表現する際に使われる。</p>
                <ul class="styled-list">
                    <li><i class="fas fa-hand-peace"></i> リラックス感・満足感</li>
                    <li><i class="fas fa-exclamation-triangle"></i> 驚き・感動</li>
                </ul>
                <p>発音時に母音を引き伸ばすことで、感情の度合いを強調することができます。</p>
            </section>

            <section id="grammar" class="section">
                <h2>📝 2. 文法情報</h2>
                <div class="subsection">
                    <h3>📌 2.1. 品詞分類</h3>
                    <p>感動詞（interjection）</p>
                </div>
                <div class="subsection">
                    <h3>🔊 2.2. 発音</h3>
                    <ul class="styled-list">
                        <li><i class="fas fa-bullhorn"></i> IPA表記：/kuː/ <button id="play-pronunciation" class="pronunciation-button"><i class="fas fa-play-circle"></i>発音を聞く</button></li>
                        <li><i class="fas fa-spell-check"></i> カタカナ表記：クゥー</li>
                        <li><i class="fas fa-info-circle"></i> 音声的特徴：発音の長さで感情が変化</li>
                    </ul>
                </div>
                <audio id="pronunciation-audio" src="{{ asset('audio/kuu7.mp3') }}" preload="auto"></audio>
            </section>

            <section id="meaning" class="section">
                <h2>💬 3. 意味と用法</h2>
                <div class="subsection">
                    <h3>🎐 3.1. リラックス感・満足感の表現</h3>
                    <p>使用者が快適さや満足感を得た際に自然に発せられる。</p>
                    <p class="example-title">✅ 例文</p>
                    <ul class="styled-list">
                        <li><i class="fas fa-hot-tub"></i> 「くぅー、温泉はやっぱり最高だな。」（温泉でリラックス）</li>
                        <li><i class="fas fa-coffee"></i> 「くぅー、コーヒーが体に染みる…」（美味しいコーヒーを飲んで安らぐ）</li>
                        <li><i class="fas fa-beer"></i> 「くぅー、仕事終わりのビールがたまらん！」（ビールの爽快感を楽しむ）</li>
                    </ul>
                </div>
                <div class="subsection">
                    <h3>🤩 3.2. 驚き・感動の表現</h3>
                    <p>驚きや感動を伴う場面で使用される。</p>
                    <p class="example-title">✅ 例文</p>
                    <ul class="styled-list">
                        <li><i class="fas fa-robot"></i> 「くぅー、これはすごい発明だ！」（驚きや感心）</li>
                        <li><i class="fas fa-gamepad"></i> 「くぅー、これはやられた！」（相手の巧妙さに驚く）</li>
                    </ul>
                </div>

                <div class="subsection">
                    <h3>🎭 3.3. 「くぅー」のみで感情を伝える（上級者向け）</h3>
                    <p>言葉を省略して「くぅー」だけで感情を表現することも可能。</p>
                    <p class="example-title">✅ 例文</p>
                    <ul class="styled-list">
                        <li><i class="fas fa-wine-glass"></i> （ビールを一口飲んで）「くぅー」</li>
                        <li><i class="fas fa-cloud-sun"></i> （温泉につかって）「くぅ～」</li>
                        <li><i class="fas fa-futbol"></i> （逆転ゴール）「くぅーっ！」</li>
                    </ul>
                </div>

                <div class="subsection">
                    <h3>🏆 3.4. 「くぅー」を強調する表現（プロフェッショナル向け）</h3>
                    <p>「くぅー」の前に言葉をつけることで、感情の強調が可能になる。</p>
                    <p class="example-title">✅ 例文</p>
                    <ul class="styled-list">
                        <li><i class="fas fa-trophy"></i> 「これこそが、くぅーっ！」</li>
                        <li><i class="fas fa-utensils"></i> 「まさに…くぅーっ！」</li>
                        <li><i class="fas fa-mountain"></i> 「これはまちがいなく…くぅーっ！」</li>
                    </ul>
                </div>

                <div class="subsection">
                    <h3>👔 3.5. 「くぅー」をフォーマルにする表現（ビジネスマン向け）</h3>
                    <p>「です」や「ですね」を付け加えることで、フォーマルな場面でも適用しやすい表現にできる。</p>
                    <p class="example-title">✅ 例文</p>
                    <ul class="styled-list">
                        <li><i class="fas fa-sun"></i> 「くぅーですよ…！」</li>
                        <li><i class="fas fa-smile-beam"></i> 「これはまさに、くぅーです。」</li>
                        <li><i class="fas fa-thumbs-up"></i> 「これはくぅーですね。」</li>
                    </ul>
                </div>
            </section>

            <!-- くぅーボタンセクション -->
            <section id="kuu-button-section" class="section">
                <h2>🎉 さぁ、くぅーしよう！🎉</h2>
                <p>「くぅー」ボタンを連打して、称号をゲット！<br/>最高の称号「伝説のくぅー」目指してくぅーしまくろう！</p> <!-- 説明文を追加 -->
                @if ($isLogin)
                    <button id="kuu-button">くぅーする</button>
                    <p id="kuu-text">くぅー</p>
                    <div class="status-display">
                        <i class="fas fa-arrow-up"></i>
                        レベル: <span id="level">1</span>
                    </div>
                    <div class="status-display">
                        <i class="fas fa-award"></i>
                        称号: <span id="title">くぅー見習い</span>
                    </div>
                    <p>連打数: <span id="count">0</span></p>
                    <p>次のレベルまで: <span id="next-level">10</span> 回</p>
                    <button id="reset-button">リセット</button>
                @else
                    <div class="not-logged-in">
                        <p class="notice">ログインしていないため、くぅーできません。</p>
                        <a href="{{ route('login') }}" class="btn btn-primary stylish-button">ログイン</a>
                        <p class="register-prompt">
                            アカウントをお持ちでない方は、
                            <a href="{{ route('register') }}" class="btn btn-secondary register-link">こちらから登録</a>
                        </p>
                    </div>
                @endif
                
            </section>

            <section id="summary" class="section">
                <h2>🎊 まとめ</h2>
                <p>「くぅー」は、リラックス感や驚きを伝える表現です。日本語学習者にもおすすめです。</p>
            </section>
        </main>

        <footer>
            <p>© 2024 くぅー公式ドキュメント</p>
            @auth
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-secondary">ログアウト</button>
            </form>
            @endauth
        </footer>
    </div>

    <!-- 複数の音声ファイル -->
    <audio id="kuuSound" preload="auto">
        <source src="{{ asset('audio/kuu1.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu1.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu2.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu2.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu3.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu3.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu4.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu4.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu5.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu5.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu6.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu6.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu7.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu7.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu8.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu8.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu9.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu10.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu11.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu11.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu12.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu12.mp3') }}" type="audio/mp3">
        <source src="{{ asset('audio/kuu13.mp3') }}" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // DBからユーザーのレベル、押下回数等を取得する
    const levelObj = @json($userLevelStatus);
    const userId = levelObj? levelObj.user_id : 0;
    let level = levelObj? levelObj.kuu_level: 0;
    let count = levelObj? levelObj.kuu_count: 0;
    let title = levelObj? levelObj.level_title.name: 'くぅー見習い';
    
    const levelUpThreshold = 3; // レベルアップに必要な回数

    document.addEventListener('DOMContentLoaded', function() {
        const loadingScreen = document.getElementById('loading-screen');
        const levelUpPopup = document.getElementById('level-up-popup');
        levelUpPopup.classList.add('hidden');

        // ローディング画面を非表示
        setTimeout(() => {
            loadingScreen.classList.add('hidden');

            // フェードインアニメーション
            const sections = document.querySelectorAll('.section');
            sections.forEach((section, index) => {
                setTimeout(() => {
                    section.classList.add('fade-in');
                }, 200 * index);
            });

        }, 2500);

        // くぅーボタンの機能
        const kuuButton        = document.getElementById('kuu-button');
        const kuuText          = document.getElementById('kuu-text');
        const resetButton      = document.getElementById('reset-button');
        const levelDisplay     = document.getElementById('level');
        const titleDisplay     = document.getElementById('title');
        const countDisplay     = document.getElementById('count');
        const nextLevelDisplay = document.getElementById('next-level'); // 追加
        
        const playPronunciationButton = document.getElementById('play-pronunciation');
        const pronunciationAudio = document.getElementById('pronunciation-audio');

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

        const kuuVariations = [
            "くぅー",
            "くぅ～～！",
            "クゥー…",
            "Ku-",
            "くううううう",
            "くぅっ！",
            "くぅ？",
        ];

        // 初期表示
        function updateDisplay() {
            levelDisplay.textContent = level;
            countDisplay.textContent = count;
            titleDisplay.textContent = title;
            nextLevelDisplay.textContent = levelUpThreshold - (count % levelUpThreshold); // 次のレベルまでの回数を計算
        }

        // くぅーボタンがクリックされた時の処理
        kuuButton.addEventListener('click', function() {
            dbUpdateKuuCount(userId, count); // DBに連打数を更新
            updateKuuText();
            playRandomKuuSound(); // ランダムな効果音を再生

        });

        function updateKuuText() {
            const randomIndex = Math.floor(Math.random() * kuuVariations.length);
            kuuText.textContent = kuuVariations[randomIndex];
        }

        function levelUp() {
            level++;
            if (level <= titles.length) {
                title = titles[level - 1];
            } else {
                title = "伝説のくぅー";
            }
        
            // ポップアップのテキストを設定
            const levelUpMessage = document.getElementById('level-up-message');
            levelUpMessage.innerHTML = `レベルアップ！<br/>称号: ${title}`;

            // ポップアップを表示
            const levelUpPopup = document.getElementById('level-up-popup');
            levelUpPopup.classList.remove('hidden');
            levelUpPopup.classList.add('active');
            levelUpPopup.style.visibility = "visible";
            levelUpPopup.style.opacity = "1";
            levelUpPopup.style.animation = "popup-jump 0.5s ease-out";

            // アニメーションが終わった後に非表示にする
            setTimeout(() => {
                levelUpPopup.style.opacity = "0";
                levelUpPopup.style.visibility = "hidden";
                levelUpPopup.classList.remove('active');
            }, 1000); // 2秒後に非表示
        }

        // 効果音を再生する関数（ランダム）
        function playRandomKuuSound() {
            const sound        = document.getElementById('kuuSound');
            const sources      = sound.getElementsByTagName('source');
            const randomIndex  = Math.floor(Math.random() * sources.length);
            const randomSource = sources[randomIndex];

            // 新しいsourceをaudio要素に設定し、再生
            sound.src = randomSource.src;
            sound.load(); // 読み込み

            // 再生開始時の処理
            sound.onplay = function() {
                // ここに再生開始時の処理を追加
                kuuButton.disabled = true;
                kuuButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>くぅー中...'
            };

            // 再生終了時の処理
            sound.onended = function() {
                // ここに再生終了時の処理を追加
                kuuButton.disabled = false;
                kuuButton.innerHTML = 'くぅーする'
            };

            sound.play();  // 再生
        }

        // リセットボタンがクリックされた時の処理
        resetButton.addEventListener('click', function() {
            if (confirm("リセットしますか？")) {
                level = 1; // レベルを初期化
                count = 0; // 連打数を初期化
                title = "くぅー見習い"; // 称号を初期化
                levelUpThreshold = 5; // レベルアップに必要な回数を初期化
                kuuVariations.length = 8; // 初期状態のバリエーションに戻す
                updateDisplay(); // 表示を更新
                kuuText.textContent = "くぅー"; // くぅーテキストを初期化
            }
        });

        updateDisplay(); // 初期表示
    });

    function dbUpdateKuuCount(userId)
    {
        const url = "{{route('top.countUp', 'USERID')}}".replace('USERID', userId);
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const data = {
            user_id: userId,
        };

        // fetchを使ってDBに連打数を更新する
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',  // レスポンス形式を指定
                'X-CSRF-TOKEN': token,  // CSRFトークンをヘッダーに追加
            },
            body: JSON.stringify(data)
            }).then(response => {
                if (!response.ok) {
                    // 2xx以外のHTTPステータス（例：400, 500など）
                    throw new Error(`HTTPエラー: ${response.status}`);
                }
                return response.json();  // レスポンスをJSONとして処理
            }).then(data => {
                console.log('成功しました！受信データ:', data); // デバック用
                const newKuuCount = data.kuu_count; 
                const kuuCountTextEl = document.querySelector('#count');
                const nextLevelCountTextEl = document.querySelector('#next-level');
                if (kuuCountTextEl) {
                    kuuCountTextEl.textContent = newKuuCount; // 連打数を更新
                }
                // レベルアップするかどうかの判定
                if (newKuuCount % levelUpThreshold === 0) {
                    dbLevelUp(userId);
                }
                if (nextLevelCountTextEl) {
                    // 次のレベルまでの回数を更新
                    nextLevelCountTextEl.textContent = levelUpThreshold - (newKuuCount % levelUpThreshold);
                }

            }).catch(error => {
                console.error('エラーが発生しました:', error);
            });
    }

    function dbLevelUp(userId)
    {
        const url = "{{route('top.levelUp', 'USERID')}}".replace('USERID', userId);
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const data = {
            user_id: userId,
            level: level,
            title: title,
        };

        // fetchを使ってDBにレベルアップを更新する
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',  // レスポンス形式を指定
                'X-CSRF-TOKEN': token,  // CSRFトークンをヘッダーに追加
            },
            body: JSON.stringify(data)
            }).then(response => {
                if (!response.ok) {
                    // 2xx以外のHTTPステータス（例：400, 500など）
                    throw new Error(`HTTPエラー: ${response.status}`);
                }
                return response.json();  // レスポンスをJSONとして処理
            }).then(data => {
                console.log('成功しました！受信データ:', data); // デバック用

                const newKuuLevel = data.level; 
                const newKuuTitle = data.level_title; 
                const kuuLevelTextEl = document.querySelector('#level');
                const kuuLevelTitleEl = document.querySelector('#title');
                
                if (kuuLevelTextEl) {
                    kuuLevelTextEl.textContent = newKuuLevel; // レベル数を更新
                }
                if (kuuLevelTitleEl) {
                    kuuLevelTitleEl.textContent = newKuuTitle; // 称号を更新
                }

                // SweetAlert2を使用してレベルアップモーダルを表示する
                Swal.fire({
                    title: '🎉 レベルアップ！ 🎉',
                    html: `
                        <p>新しいレベル: <strong>${newKuuLevel}</strong></p>
                        <p>新しい称号: <strong>${newKuuTitle}</strong></p>
                    `,
                    icon: 'success',
                    confirmButtonText: '閉じる',
                    customClass: {
                        popup: 'swal2-custom-popup',
                        confirmButton: 'swal2-custom-button'
                    }
                });
                
            }).catch(error => {
                console.error('エラーが発生しました:', error);
            });
    }
</script>
