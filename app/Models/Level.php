<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    /**
     * テーブル名
     *
     * @var string
     */
    protected $table = 'levels';

    /**
     * 一括代入可能な属性
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
     * 関連するユーザーレベルテーブルとのリレーション
     */
    public function userLevels()
    {
        return $this->hasMany(UserKuuStatus::class, 'kuu_level', 'level');
    }
}
