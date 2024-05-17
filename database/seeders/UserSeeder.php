<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '一太郎',
            'name_kana' => 'イチタロウ',
            'email' => 'ich@a.com',
            'profile_image' => 'aaa',
            'password' => 'ichiichi',
            'grade_id' => '1'
        ]);
        User::create([
            'name' => '二太郎',
            'name_kana' => 'ニタロウ',
            'email' => 'ni@a.com',
            'profile_image' => 'aaa',
            'password' => 'nininini',
            'grade_id' => '2'

        ]);
        User::create([
            'name' => '三太郎',
            'name_kana' => 'サンタロウ',
            'email' => 'san@a.com',
            'profile_image' => 'aaa',
            'password' => 'sansansan',
            'grade_id' => '1'
        ]);
    }
}
