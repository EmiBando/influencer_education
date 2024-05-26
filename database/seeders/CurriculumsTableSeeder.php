<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CurriculumsTableSeeder extends Seeder
{
    public function run()
    {
        $grades = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]; 
        $now = Carbon::now();

        foreach ($grades as $grade_id) {
            for ($i = 1; $i <= 5; $i++) {
                DB::table('curriculums')->insert([
                    'title' => "授業 {$i} - 学年 {$grade_id}",
                    'thumbnail' => "thumbnail{$i}.jpg",
                    'description' => "学年 {$grade_id} の授業 {$i} の説明",
                    'video_url' => "http://example.com/video{$i}",
                    'alway_delivery_flg' => 1,
                    'grade_id' => $grade_id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
