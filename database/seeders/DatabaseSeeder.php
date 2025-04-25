<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // レベル名の初期データを投入する処理を書く
        $levels = [
            ['name' => 'くぅー見習い','level' => 1],
            ['name' => '駆け出しのくぅー', 'level' => 2],
            ['name' => 'くぅーマスター', 'level' => 3],
            ['name' => 'くぅーソムリエ', 'level' => 4],
            ['name' => 'くぅーエヴァンジェリスト', 'level' => 5],
            ['name' => 'くぅー仙人', 'level' => 6],
            ['name' => 'くぅー神', 'level' => 7],
            ['name' => 'くぅーエンペラー', 'level' => 8],
            ['name' => 'リビングレジェンドくぅー', 'level' => 9],
            ['name' => 'くぅーの化身', 'level' => 10],
            ['name' => '歩くくぅー', 'level' => 11],
            ['name' => 'くぅーそのもの', 'level' => 12],
            ['name' => 'くぅー探検隊', 'level' => 13],
            ['name' => 'くぅー無限湧き', 'level' => 14],
            ['name' => 'くぅー最終形態', 'level' => 15],
            ['name' => 'くぅー・デ・オージャス', 'level' => 16],
            ['name' => 'くぅー警備隊長', 'level' => 17],
            ['name' => 'くぅー学概論教授', 'level' => 18],
            ['name' => 'くぅー is ライフ', 'level' => 19],
            ['name' => 'くぅーいただきました！', 'level' => 20],
            ['name' => 'くぅー year！', 'level' => 21],
            ['name' => 'くぅーしか勝たん', 'level' => 22],
            ['name' => 'くぅーの呼吸 壱ノ型', 'level' => 23],
            ['name' => 'くぅーに始まりくぅーに終わる', 'level' => 24],
            ['name' => 'くぅーで天下統一', 'level' => 25],
            ['name' => '自走式くぅー', 'level' => 26],
            ['name' => 'くぅー型決戦兵器', 'level' => 27],
            ['name' => 'くぅーtime', 'level' => 28],
            ['name' => 'くぅーしか信じない', 'level' => 29],
            ['name' => 'くぅーの夢を見る', 'level' => 30],
            ['name' => '今日もくぅー日和', 'level' => 31],
            ['name' => '晩餐はくぅー', 'level' => 32],
            ['name' => 'くぅーダビデ像', 'level' => 33],
            ['name' => 'くぅービッグバン', 'level' => 34],
            ['name' => 'くぅーアルティメット', 'level' => 35],
            ['name' => 'くぅー・オブ・ジョイトイ', 'level' => 36],
            ['name' => 'くぅーこそ正義', 'level' => 37],
            ['name' => 'くぅーなる秩序', 'level' => 38],
            ['name' => 'くぅーリューション', 'level' => 39],
            ['name' => 'くぅーティスト', 'level' => 40],
            ['name' => 'くぅーニング', 'level' => 41],
            ['name' => 'くぅーカイザー', 'level' => 42],
            ['name' => 'くぅー将軍', 'level' => 43],
            ['name' => 'くぅー式アロマ', 'level' => 44],
            ['name' => 'くぅーミルフィーユ', 'level' => 45],
            ['name' => 'くぅーベルク', 'level' => 46],
            ['name' => 'くぅーバリア', 'level' => 47],
            ['name' => 'くぅーインパクト', 'level' => 48],
            ['name' => 'くぅーイノベーション', 'level' => 49],
            ['name' => 'くぅーエナジー', 'level' => 50],
            ['name' => 'くぅーマニアックス', 'level' => 51],
            ['name' => 'くぅーロマンス', 'level' => 52],
            ['name' => '全知全能のくぅー', 'level' => 53],
            ['name' => 'くぅーとんきょう', 'level' => 54],
            ['name' => 'くぅーイズム', 'level' => 55],
            ['name' => 'くぅー！まかせんしゃい！', 'level' => 56],
            ['name' => 'くぅー食いねぇ！', 'level' => 57],
            ['name' => 'くぅー寝る！', 'level' => 58],
            ['name' => 'くぅー！許してヒヤシンス！', 'level' => 59],
            ['name' => 'くぅーは文化！', 'level' => 60],
            ['name' => 'くぅー！もはや意味不明！', 'level' => 61],
            ['name' => '脳内くぅー再生マシーン', 'level' => 62],
            ['name' => 'くぅー言っときゃ何とかなる', 'level' => 63],
            ['name' => 'くぅー系YouTuber', 'level' => 64],
            ['name' => 'くぅーしか喋れない', 'level' => 65],
            ['name' => 'くぅー教教祖', 'level' => 66],
            ['name' => 'くぅーに全てを捧げた男', 'level' => 67],
            ['name' => 'くぅーの申し子', 'level' => 68],
            ['name' => 'くぅーって言いたいだけ', 'level' => 69],
            ['name' => 'くぅー！ふざけんな！', 'level' => 70],
            ['name' => 'くぅー！マジ卍！', 'level' => 71],
            ['name' => 'くぅーの権化', 'level' => 72],
            ['name' => 'くぅーしか愛せない', 'level' => 73],
            ['name' => 'くぅーチャンス！', 'level' => 74],
            ['name' => 'くぅー案件ください', 'level' => 75],
            ['name' => 'くぅー！それな！', 'level' => 76],
            ['name' => 'とりあえずくぅー', 'level' => 77],
            ['name' => 'くぅー！知らんけど！', 'level' => 78],
            ['name' => 'くぅー！うるせぇ！', 'level' => 79],
            ['name' => 'くぅーは裏切らない', 'level' => 80],
            ['name' => 'くぅー！おやすみプンプン！', 'level' => 81],
            ['name' => 'くぅー！エモい！', 'level' => 82],
            ['name' => 'くぅー！優勝！', 'level' => 83],
            ['name' => 'くぅー！草！', 'level' => 84],
            ['name' => 'くぅー！尊い！', 'level' => 85],
            ['name' => 'くぅー is GOD', 'level' => 86],
            ['name' => 'くぅーしか勝たん！【公式】', 'level' => 87],
            ['name' => 'くぅーで地球を救う', 'level' => 88],
            ['name' => 'くぅーの錬金術師', 'level' => 89],
            ['name' => 'くぅーデストロイヤー', 'level' => 90],
            ['name' => 'くぅー・ザ・ワールド', 'level' => 91],
            ['name' => 'くぅー・オブ・レジェンド', 'level' => 92],
            ['name' => 'くぅーファイナリスト', 'level' => 93],
            ['name' => 'くぅーインフルエンサー', 'level' => 94],
            ['name' => 'くぅーアドバイザー', 'level' => 95],
            ['name' => 'くぅーウォッチャー', 'level' => 96],
            ['name' => 'くぅーソウル', 'level' => 97],
            ['name' => 'くぅーメサイア', 'level' => 98],
            ['name' => 'くぅー・ターミネーター', 'level' => 99],
            ['name' => 'くぅーウェーブ', 'level' => 100],
        ];

        foreach($levels as $level) {
            Level::create(
                $level,
            );
        }
    }
}
