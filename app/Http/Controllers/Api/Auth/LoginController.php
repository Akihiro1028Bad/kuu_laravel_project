<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => '認証失敗'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('access-token')->plainTextToken;

        return response()->json([
            'message' => 'ログイン成功',
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function destroy(Request $request): JsonResponse
{
    // トークンベースのログアウト（現在のアクセストークンを削除）
    $request->user()->currentAccessToken()?->delete();

    return response()->json([
        'message' => 'ログアウトしました',
    ]);
}
}
