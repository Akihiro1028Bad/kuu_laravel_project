<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Level;
use App\Models\User;
use App\Models\UserKuuStatus;
use App\Http\Requests\KuuCountAddRequest;
use App\Http\Requests\KuuLevelAddRequest;

class TopDocumentController extends Controller
{
    protected $levelModel;
    protected $userModel;
    protected $userKuuStatusModel;

    // コンストラクタ
    public function __construct(Level $levelModel, User $userModel, UserKuuStatus $userKuuStatusModel)
    {
        $this->levelModel = $levelModel;
        $this->userModel = $userModel;
        $this->userKuuStatusModel = $userKuuStatusModel;
    }
    
    // トップドキュメントを表示
    public function index()
    {
        // 現在ログインしているかを判定
        $isLogin = Auth::check();

        $level = null;
        $userLevelStatus = null;

        // ログインしている場合、ユーザー情報を取得
        if ($isLogin) {
            $user = Auth::user();
            $userLevelStatus = $this->userKuuStatusModel->getKuuStatusByUserId($user->id);
        }

        return view('top', compact(['isLogin', 'userLevelStatus']));
    }

    // クゥーボタン押下時にカウントを更新
    public function countUp(KuuCountAddRequest $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);
        if (!$user) {
            return Redirect::back()->withErrors(['error' => 'User not found.']);
        }

        // ユーザーIDからKuuStatusを取得
        $userKuuStatus = $this->userKuuStatusModel->getKuuStatusByUserId($userId);

        // KuuCountをインクリメント（1つプラスする）
        $userKuuStatus->increment('kuu_count');

        return response()->json([
            'success' => true,
            'message' => 'クゥーカウントを一つ増やしました。',
            'kuu_count' => $userKuuStatus->kuu_count,
        ]);
    }

     // レベルアップ
    public function levelUp(KuuLevelAddRequest $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);
        if (!$user) {
            return Redirect::back()->withErrors(['error' => 'User not found.']);
        }

        // ユーザーIDからKuuStatusを取得
        $userKuuStatus = $this->userKuuStatusModel->getKuuStatusByUserId($userId);
        
        // レベルを1つ更新
        $userKuuStatus->increment('kuu_level');

        // ユーザーIDから新しいKuuStatusを取得
        $newUserKuuStatus = $this->userKuuStatusModel->getKuuStatusByUserId($userId);

        return response()->json([
            'success' => true,
            'message' => 'レベルアップしました。',
            'level' => $newUserKuuStatus->kuu_level,
            'level_title' => $newUserKuuStatus->levelTitle->name,
        ]);
    }

    // ランキング一覧取得
    public function getRankingList()
    {
        $rankingList = $this->userKuuStatusModel->getRankingList();

        return response()->json([
            'success' => true,
            'ranking_list' => $rankingList,
        ]);
    }
}
