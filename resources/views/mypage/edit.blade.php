@extends('layouts.kuu')

@section('title', 'プロフィール編集')
@section('content')

@push('styles')
    <!-- マイページ編集画面専用CSS -->
    <link rel="stylesheet" href="{{ asset('css/mypage_edit.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

<div class="container my-4 my-lg-5">
    <div class="edit-profile-page-card">
        <div class="edit-profile-header">
            <h2 class="edit-profile-title">プロフィール編集</h2>
        </div>

        <form class="edit-profile-form" action="{{ route('mypage.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            <!-- CSRFトークン (Laravelの場合) -->
            @csrf
            <!-- Method Spoofing (Laravelの場合) -->
            @method('PUT')

            <!-- Avatar Edit -->
            <div class="form-group avatar-edit-group">
                <div class="avatar-preview-container">
                    <!-- 現在のアバター表示。$user->avatar_url があればそれを、なければプレースホルダー -->
                    <img src="https://via.placeholder.com/100" alt="Current Avatar" id="avatarPreview" class="avatar-preview-img">
                </div>
                {{-- ボタンとヘルプテキストをまとめるコンテナ --}}
                <div class="avatar-actions-container">
                    <label for="avatarUpload" class="avatar-upload-button">
                        <i class="fas fa-camera"></i> アバターを変更
                    </label>
                    <input type="file" id="avatarUpload" name="avatar" class="d-none" accept="image/*">
                    <small class="form-text-custom d-block mt-2">推奨サイズ: 200x200px, JPG, PNG</small>
                </div>
            </div>

            <!-- Username -->
            <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" id="name" name="name" class="form-control-custom" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" class="form-control-custom" value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Bio/Profile Text -->
            <div class="form-group">
                <label for="bio">自己紹介 (任意)</label>
                <textarea id="bio" name="bio" class="form-control-custom" rows="4" placeholder="例: Kuuが大好きです！よろしくお願いします。">{{-- {{ old('bio', $user->bio) }} --}}</textarea>
            </div>

            <!-- パスワード変更についてはとりあえずなしにしておく -->
            <!-- <hr class="my-4">
            <p class="mb-3" style="font-weight: 500; color: var(--primary-color);">パスワード変更 (変更する場合のみ入力)</p> -->

            <!-- Current Password -->
            <!-- <div class="form-group">
                <label for="current_password">現在のパスワード</label>
                <div class="password-toggle-group">
                    <input type="password" id="current_password" name="current_password" class="form-control-custom" autocomplete="current-password">
                    <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('current_password')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div> -->

            <!-- New Password -->
            <!-- <div class="form-group">
                <label for="new_password">新しいパスワード</label>
                    <div class="password-toggle-group">
                    <input type="password" id="new_password" name="new_password" class="form-control-custom" autocomplete="new-password">
                    <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('new_password')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <small class="form-text-custom">8文字以上で設定してください。</small>
            </div> -->

            <!-- Confirm New Password -->
            <!-- <div class="form-group">
                <label for="new_password_confirmation">新しいパスワード (確認)</label>
                <div class="password-toggle-group">
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control-custom" autocomplete="new-password">
                        <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('new_password_confirmation')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div> -->

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="{{ route('mypage.index', ['user_id' => Auth::id()]) }}" class="btn-custom btn-cancel-custom">
                    <i class="fas fa-times"></i> キャンセル
                </a>
                <button type="submit" class="btn-custom btn-save-custom">
                    <i class="fas fa-save"></i> 保存する
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
    <!-- Bootstrap JS (マイページで使用されているため) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Avatar preview script
        const avatarUpload = document.getElementById('avatarUpload');
        const avatarPreview = document.getElementById('avatarPreview');
        if (avatarUpload && avatarPreview) {
            avatarUpload.onchange = function (evt) {
                const [file] = this.files;
                if (file) {
                    avatarPreview.src = URL.createObjectURL(file);
                }
            };
        }

        // Password visibility toggle
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling.querySelector('i'); // buttonの直接の子であるiタグを取得
            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                field.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
@endpush