<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>くぅー（kuuー）— ログインページ</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <main>
            <section id="login-section" class="section">
                <h2>ログイン</h2>
                <form method="POST" action="{{ route('login') }}" class="styled-form">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label">メールアドレス</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-input">
                        @error('email')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">パスワード</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="form-input">
                        @error('password')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-group">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" class="form-checkbox">
                            <span class="form-label">ログイン状態を保持する</span>
                        </label>
                    </div>

                    <div class="form-actions">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="btn-link">パスワードをお忘れですか？</a>
                        @endif
                        <button type="submit" class="btn btn-primary">ログイン</button>
                    </div>
                    <div class="register-prompt">
                        <p>アカウントをお持ちでない方は、<a href="{{ route('register') }}" class="btn btn-secondary">こちらから作成</a></p>
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