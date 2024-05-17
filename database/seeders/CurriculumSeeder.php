<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curriculum;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curriculum::create([
            'title'=>'カリキュラムタイトル',
            'thumbnail'=> '/storage/storage/img/thumbnail.jpg',
            'description'=>'カリキュラム説明文の本文です',
            'video_url'=>'https://youtu.be/5vQU9DEMQIM?si=zTUS2dT1HmBU5lnR',
            'always_delivery_flg'=>'1',
            'grade_id'=>'1'
        ]);
    }
}
