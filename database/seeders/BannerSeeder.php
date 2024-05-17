<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'image' => '/storage/storage/img/sample1.jpg'
        ]);
        Banner::create([
            'image' => '/storage/storage/img/sample2.jpg'
        ]);
        Banner::create([
            'image' => '/storage/storage/img/sample3.jpg'
        ]);
    }
}
