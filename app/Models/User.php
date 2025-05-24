<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // ステータスとレベルのリレーション
    public function userKuuStatus()
    {
        return $this->hasOne(UserKuuStatus::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function updateProfile($user, $request)
    {
        // ユーザー情報を更新する
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            // 古い画像を削除（必要なら）
            if ($user->profile_image_path) {
                Storage::disk('s3')->delete($user->profile_image_path);
            }

            // S3へアップロード
            $path = $request->file('avatar')->store('avatars', 's3');
            $user->profile_image_path = $path;
        }

        // とりあえずパスワードは現状は不要
        // パスワードが入力されている場合はハッシュ化して保存する
        // if ($request->filled('password')) {
        //     $user->password = bcrypt($request->password);
        // }

        // ユーザー情報を保存する
        try {
            $user->save();
        } catch (\Exception $e) {
            // エラーログを記録する
            Log::error('ユーザー情報の更新に失敗しました。', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }
}
