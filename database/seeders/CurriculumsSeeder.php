<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データを配列で定義
        $curriculums = [
            // 小学1年生
            ['title' => '授業タイトルa', 'grade_id' => 1],
            ['title' => '授業タイトルb', 'grade_id' => 1],
            ['title' => '授業タイトルc', 'grade_id' => 1],
            ['title' => '授業タイトルd', 'grade_id' => 1],
            ['title' => '授業タイトルe', 'grade_id' => 1],
            ['title' => '授業タイトルf', 'grade_id' => 1],

            // 小学2年生
            ['title' => '授業タイトルa', 'grade_id' => 2],
            ['title' => '授業タイトルb', 'grade_id' => 2],
            ['title' => '授業タイトルc', 'grade_id' => 2],
            ['title' => '授業タイトルd', 'grade_id' => 2],
            ['title' => '授業タイトルe', 'grade_id' => 2],
            ['title' => '授業タイトルf', 'grade_id' => 2],

            // 小学3年生
            ['title' => '授業タイトルa', 'grade_id' => 3],
            ['title' => '授業タイトルb', 'grade_id' => 3],
            ['title' => '授業タイトルc', 'grade_id' => 3],
            ['title' => '授業タイトルd', 'grade_id' => 3],
            ['title' => '授業タイトルe', 'grade_id' => 3],
            ['title' => '授業タイトルf', 'grade_id' => 3],

            // 小学4年生
            ['title' => '授業タイトルa', 'grade_id' => 4],
            ['title' => '授業タイトルb', 'grade_id' => 4],
            ['title' => '授業タイトルc', 'grade_id' => 4],
            ['title' => '授業タイトルd', 'grade_id' => 4],
            ['title' => '授業タイトルe', 'grade_id' => 4],
            ['title' => '授業タイトルf', 'grade_id' => 4],

            // 小学5年生
            ['title' => '授業タイトルa', 'grade_id' => 5],
            ['title' => '授業タイトルb', 'grade_id' => 5],
            ['title' => '授業タイトルc', 'grade_id' => 5],
            ['title' => '授業タイトルd', 'grade_id' => 5],
            ['title' => '授業タイトルe', 'grade_id' => 5],
            ['title' => '授業タイトルf', 'grade_id' => 5],

            // 小学6年生
            ['title' => '授業タイトルa', 'grade_id' => 6],
            ['title' => '授業タイトルb', 'grade_id' => 6],
            ['title' => '授業タイトルc', 'grade_id' => 6],
            ['title' => '授業タイトルd', 'grade_id' => 6],
            ['title' => '授業タイトルe', 'grade_id' => 6],
            ['title' => '授業タイトルf', 'grade_id' => 6],

            // 中学1年生
            ['title' => '授業タイトルa', 'grade_id' => 7],
            ['title' => '授業タイトルb', 'grade_id' => 7],
            ['title' => '授業タイトルc', 'grade_id' => 7],
            ['title' => '授業タイトルd', 'grade_id' => 7],
            ['title' => '授業タイトルe', 'grade_id' => 7],
            ['title' => '授業タイトルf', 'grade_id' => 7],

            // 中学2年生
            ['title' => '授業タイトルa', 'grade_id' => 8],
            ['title' => '授業タイトルb', 'grade_id' => 8],
            ['title' => '授業タイトルc', 'grade_id' => 8],
            ['title' => '授業タイトルd', 'grade_id' => 8],
            ['title' => '授業タイトルe', 'grade_id' => 8],
            ['title' => '授業タイトルf', 'grade_id' => 8],

            // 中学3年生
            ['title' => '授業タイトルa', 'grade_id' => 9],
            ['title' => '授業タイトルb', 'grade_id' => 9],
            ['title' => '授業タイトルc', 'grade_id' => 9],
            ['title' => '授業タイトルd', 'grade_id' => 9],
            ['title' => '授業タイトルe', 'grade_id' => 9],
            ['title' => '授業タイトルf', 'grade_id' => 9],

            // 高校1年生
            ['title' => '授業タイトルa', 'grade_id' => 10],
            ['title' => '授業タイトルb', 'grade_id' => 10],
            ['title' => '授業タイトルc', 'grade_id' => 10],
            ['title' => '授業タイトルd', 'grade_id' => 10],
            ['title' => '授業タイトルe', 'grade_id' => 10],
            ['title' => '授業タイトルf', 'grade_id' => 10],

            // 高校2年生
            ['title' => '授業タイトルa', 'grade_id' => 11],
            ['title' => '授業タイトルb', 'grade_id' => 11],
            ['title' => '授業タイトルc', 'grade_id' => 11],
            ['title' => '授業タイトルd', 'grade_id' => 11],
            ['title' => '授業タイトルe', 'grade_id' => 11],
            ['title' => '授業タイトルf', 'grade_id' => 11],

            // 高校3年生
            ['title' => '授業タイトルa', 'grade_id' => 12],
            ['title' => '授業タイトルb', 'grade_id' => 12],
            ['title' => '授業タイトルc', 'grade_id' => 12],
            ['title' => '授業タイトルd', 'grade_id' => 12],
            ['title' => '授業タイトルe', 'grade_id' => 12],
            ['title' => '授業タイトルf', 'grade_id' => 12],

            // 他のカリキュラムデータがあれば追記してください
        ];

        // データの挿入
        DB::table('curriculums')->insert($curriculums);
    }
}
