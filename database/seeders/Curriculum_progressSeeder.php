<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curriculum_progress;

class Curriculum_progressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curriculum_progress::create([
            'curriculumus_id'=>'1',
            'users_id'=>'3',
            'clear_flg'=>'1',
        ]);
    }
}
