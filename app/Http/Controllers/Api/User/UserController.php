<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\User;
use App\Models\UserKuuStatus;
use App\Http\Controllers\Controller;

class UserController extends Controller
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

    public function me()
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // ユーザー情報と関連情報を取得
        $user = $this->userModel
            ->with(['userKuuStatus', 'userKuuStatus.levelTitle'])
            ->findOrFail($userId);

        // ランキングを取得
        $rankingPosition = $this->userKuuStatusModel->getUserRanking($userId);

        // JSONで返す
        return response()->json([
            'name' => $user->name,
            'kuu_count' => $user->userKuuStatus->kuu_count,
            'ranking' => $rankingPosition,
            'title' => $user->userKuuStatus->levelTitle->name,
            'level' => $user->userKuuStatus->kuu_level,
        ]);
    }

    // マイページ編集画面
    public function edit($userId)
    {
        // ユーザー情報を取得する
        $user = $this->userModel->findOrFail($userId);

        // マイページ編集画面を表示する
        return view('mypage.edit')->with(compact('user'));
    }

    /**
     * プロフィール更新処理
     *
     * @param ProfileUpdateRequest $request
     * @param int $userId
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request, $userId)
    {
        // ユーザー情報を取得する
        $user = $this->userModel->findOrFail($userId);

        // ユーザー情報を更新する
        try {
            $this->userModel->updateProfile($user, $request);
        } catch (\Exception $e) {
            Log::error('ユーザー情報の更新に失敗しました。', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
            // エラーメッセージを表示する
            return Redirect::back()->withErrors(['error' => 'プロフィールの更新に失敗しました']);
        }

        // マイページにリダイレクトする
        return Redirect::route('mypage.index', ['user_id' => Auth::id()])->with('success', 'プロフィールが更新されました');
    }
}
