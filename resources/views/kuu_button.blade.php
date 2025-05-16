@extends('layouts.kuu')

@section('title', 'くぅー（kuuー）')
@section('content')
<div class="container"> {{-- コンテナとメインコンテンツラッパーを追加 --}}
    <!-- くぅーボタンセクション -->
    <section id="kuu-button-section" class="section">
        <h2>🎉 さぁ、くぅーしよう！🎉</h2>
        <p>「くぅー」ボタンを連打して、称号をゲット！<br/>最高の称号「伝説のくぅー」目指してくぅーしまくろう！</p> <!-- 説明文を追加 -->
        @auth
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
        @endauth
    </section>
    @auth
    <section id="kuu-ranking" class="section">
        <h2>🏆 クゥーランキング</h2>
        <div id="ranking-container" class="ranking-container">
            <!-- jsで描画します -->
        </div>
    </section>
    @endauth
</div>
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
@endsection

@push('scripts')

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
            rankingRender(); // ランキング表示
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
                    dbLevelUp(userId).then(($data) => {
                        rankingRender();
                    });
                } else {
                    rankingRender();
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

        // fetchを使ってDBにレベルを更新する
        return fetch(url, {
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

    // クゥーランキング表示メソッド
    function rankingRender()
    {
        // DBからランキングデータを取得する
        const url = "{{route('top.getRankingList')}}";
        // fetchを使ってDBからランキングデータを取得する
        fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',  // レスポンス形式を指定
            }}).then(response => {
                if (!response.ok) {
                    // 2xx以外のHTTPステータス（例：400, 500など）
                    throw new Error(`HTTPエラー: ${response.status}`);
                }
                return response.json();  // レスポンスをJSONとして処理
            }).then(data => {
                console.log('成功しました！受信データ:', data); // デバック用

                let rankingHtml = '';
                data.ranking_list.forEach((item, index) => {
                    rankingHtml += `
                            <div class="ranking-item">
                                <div class="rank-number">
                                    ${index + 1}
                                </div>
                                <div class="user-info">
                                    <span class="username">${item.user.name}</span>
                                    <div class="status-info">
                                        <span class="level">Lv.${item.kuu_level}</span>
                                        <span class="title">${item.level_title.name}</span>
                                    </div>
                                </div>
                                <div class="kuu-count">
                                    <i class="fas fa-star"></i>
                                    <span>${item.kuu_count}回くぅーしました</span>
                                </div>
                            </div>`;
                });

                const rankingContainer = document.querySelector('#ranking-container');
                rankingContainer.innerHTML = rankingHtml; // ランキングを更新
            });
    }
</script>

@endpush