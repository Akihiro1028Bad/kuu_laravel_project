<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKuuStatus extends Model
{
    /**
     * テーブル名
     *
     * @var string
     */
    protected $table = 'user_kuu_statuses';

    /**
     * 一括代入可能な属性
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'kuu_count',
        'kuu_level',
    ];

    /**
     * 日付属性のキャスト
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * ユーザーとのリレーション
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * レベルタイトルとのリレーション
     */
    public function levelTitle()
    {
        return $this->belongsTo(Level::class, 'kuu_level', 'level');
    }

    /**
     * ユーザーIDからKuuStatusを取得するメソッド
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getKuuStatusByUserId($userId)
    {
        return $this->with('levelTitle')->where('user_id', $userId)->first();
    }

    /**
     * インサートメソッド
     *
     * @return bool
     */
    public function insertKuuStatus($userId)
    {
        $this->user_id = $userId;
        $this->kuu_count = 0;
        $this->kuu_level = 1;

        return $this->save();
    }

    /**ランキングリストを取得するメソッド
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRankingList($limit = 5)
    {
        return $this->with(['user', 'levelTitle'])
            ->orderBy('kuu_count', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * 特定のユーザーのランキング順位を取得するメソッド
     *
     * @param int $userId
     * @return int|null
     */
    public function getUserRanking($userId)
    {
        $rank = $this->where('kuu_count', '>', function ($query) use ($userId) {
                $query->select('kuu_count')
                    ->from($this->table)
                    ->where('user_id', $userId);
            })
            ->count();

        return $rank + 1;
    }
}
