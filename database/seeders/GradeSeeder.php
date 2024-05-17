<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
            'name' => '未設定'
        ]);
        Grade::create([
            'name' => '小学1年生'
        ]);
        Grade::create([
            'name' => '小学2年生'
        ]);
    }
}
