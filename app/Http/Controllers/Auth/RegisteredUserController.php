<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserKuuStatus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
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
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

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
        $isLogin = Auth::check();

        // ログイン後にリダイレクトするURLを指定
        return redirect()->route('index', compact(['isLogin']));
    }
}
