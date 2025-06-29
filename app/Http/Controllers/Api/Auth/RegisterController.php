<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserKuuStatus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * @var UserKuuStatus
     */
    protected $userKuuStatus;

    /**
     * コンストラクタ
     *
     * @var model
     */
    public function __construct(UserKuuStatus $userKuuStatus)
    {
        $this->userKuuStatus = $userKuuStatus;
    }

    /**
     * 新規ユーザー登録リクエストを処理します。
     *
     * バリデーションエラーが発生した場合は、ValidationExceptionをスローします。
     *
     * @throws \Illuminate\Validation\ValidationException バリデーションに失敗した場合
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // ユーザーのkuu_statusを登録
        $this->userKuuStatus->insertKuuStatus($user->id);
        // ログイン状態であるかチェックする
        //$isLogin = Auth::check()

        return response()->json([
            'message' => 'ユーザーの登録に成功しました。',
            'user' => $user
        ], 201);
    }
}