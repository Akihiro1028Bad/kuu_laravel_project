@extends('layouts.kuu')

@section('title', 'マイページ')
@section('content')

@push('styles')
    <!-- マイページ専用CSS V2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endpush

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>成功:</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>エラー:</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container my-4 my-lg-5">
    <div class="profile-card-v2">
        <div class="profile-card-header">
            <div class="d-flex align-items-center">
                <div class="profile-avatar-v2 me-3 me-md-4">
                    <!-- アバター画像がある場合はこちらを有効化 -->
                    <img
                        src="{{ $user->profile_image_path ? Storage::disk('s3')->temporaryUrl($user->profile_image_path, now()->addMinutes(10)) : 'https://via.placeholder.com/100' }}"
                        alt="Current Avatar"
                        id="avatarPreview"
                        class="avatar-preview-img"
                    >
                </div>
                <div class="profile-user-info-v2">
                    <h1 class="profile-username-v2 mb-0">{{ $user->name }}</h1>
                    <p class="profile-title-v2 mb-0">
                        <i class="fas fa-medal me-1"></i>{{ $user->userKuuStatus->levelTitle->name }}
                    </p>
                </div>
            </div>
            <a href="{{ route('mypage.edit', $user->id) }}" class="btn profile-edit-btn-v2 ms-auto">
                <i class="fas fa-user-edit"></i>
                <span class="d-md-inline ms-1">編集</span>
            </a>
        </div>

        <div class="profile-card-body">
            <div class="row g-3">
                <div class="col-6">
                    <div class="stat-item-v2">
                        <div class="stat-icon-v2 text-accent-color">
                            <i class="fas fa-bolt fa-fw"></i>
                        </div>
                        <div>
                            <span class="stat-label-v2 d-block">総くぅー</span>
                            <span class="stat-value-v2 d-block">{{ $user->userKuuStatus->kuu_count }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-item-v2">
                        <div class="stat-icon-v2 text-accent-color">
                            <i class="fas fa-trophy fa-fw"></i>
                        </div>
                        <div>
                            <span class="stat-label-v2 d-block">ランキング</span>
                            <span class="stat-value-v2 d-block">{{ $rankingPosition }}<small>位</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush
