<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<= 10; $i++){
            Article::create([
                'title'=>'お知らせタイトル'.$i,
                'posted_date'=> now(),
                'article_contents'=>'お知らせの本文です'
            ]);
        }
    }
}
