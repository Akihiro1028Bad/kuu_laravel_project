@extends('layouts.kuu')

@section('title', 'マイページ')
@section('content')

@push('styles')
    <!-- マイページ専用CSS V2 -->
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endpush


    <div class="container my-4 my-lg-5">
        <div class="profile-card-v2">
            <div class="profile-card-header">
                <div class="d-flex align-items-center">
                    <div class="profile-avatar-v2 me-3 me-md-4">
                        <!-- アバター画像がある場合はこちらを有効化 -->
                        <!-- <img src="https://via.placeholder.com/100" alt="User Avatar" class="img-fluid"> -->
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                    <div class="profile-user-info-v2">
                        <h1 class="profile-username-v2 mb-0">くぅー伝道師</h1>
                        <p class="profile-title-v2 mb-0">
                            <i class="fas fa-medal me-1"></i>至高の「くぅー」マスター
                        </p>
                    </div>
                </div>
                <a href="#" class="btn profile-edit-btn-v2 ms-auto">
                    <i class="fas fa-user-edit"></i>
                    <span class="d-none d-md-inline ms-1">編集</span>
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
                                <span class="stat-value-v2 d-block">10,234</span>
                                <span class="stat-label-v2 d-block">総くぅー</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-item-v2">
                            <div class="stat-icon-v2 text-accent-color">
                                <i class="fas fa-trophy fa-fw"></i>
                            </div>
                            <div>
                                <span class="stat-value-v2 d-block">28<small>位</small></span>
                                <span class="stat-label-v2 d-block">ランキング</span>
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

