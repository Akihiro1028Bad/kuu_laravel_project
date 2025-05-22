<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\UserKuuStatus;

class MyPageController extends Controller
{
    protected $levelModel;
    protected $userModel;
    protected $userKuuStatusModel;

    // コンストラクタ
    public function __construct(User $userModel, UserKuuStatus $userKuuStatusModel)
    {
        $this->userKuuStatusModel = $userKuuStatusModel;
        $this->userModel = $userModel;
    }

    // マイページ閲覧
    public function index($userId)
    {
        // ユーザー情報を取得する
        $user = $this->userModel->with(['userKuuStatus', 'userKuuStatus.levelTitle'])->findOrFail($userId);

        // ランキングを取得する
        $rankingPosition = $this->userKuuStatusModel->getUserRanking($userId);

        // マイページを表示する
        return view('mypage.index')->with(compact('user', 'rankingPosition'));
    }

    // マイページ編集画面
    public function edit($userId)
    {
        // ユーザー情報を取得する
        $user = $this->userModel->findOrFail($userId);

        // マイページ編集画面を表示する
        return view('mypage.edit')->with(compact('user'));
    }
}
