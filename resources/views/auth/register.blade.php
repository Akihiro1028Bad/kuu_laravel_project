<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>くぅー（kuuー）— 登録ページ</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>くぅー（kuuー）</h1>
            <p>アカウント登録</p>
        </header>

        <main>
            <section id="register-section" class="section">
                <h2>🎉 新規登録 🎉</h2>
                <p>以下のフォームに必要事項を入力して、くぅーの世界に参加しましょう！</p>

                <form method="POST" action="{{ route('register') }}" class="styled-form">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name" class="form-label">名前</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-input">
                        @error('name')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label">メールアドレス</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-input">
                        @error('email')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">パスワード</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="form-input">
                        @error('password')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">パスワード（確認用）</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-input">
                        @error('password_confirmation')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('login') }}" class="btn-link">すでに登録済みですか？</a>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </section>
        </main>

        <footer>
            <p>© 2024 くぅー公式ドキュメント</p>
        </footer>
    </div>
</body>

</html>