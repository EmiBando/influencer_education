<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'posted_date', 'article_contents'];
    protected $casts = ['posted_date' => 'datetime'];
    

    //日時のフォーマット変更
    public function getFormattedPostedDateAttribute()
    {
    return $this->posted_date->format('Y年n月j日');
    }

    public static function validateArticle($data)
    {
        $rules = [
            'title' => 'required|max:255',
            'postedDate' => 'required|date',
            'articleContents' => 'required'
        ];

        $messages = [
            'title.required' => 'タイトルフィールドは必須です。',
            'postedDate.required' => '投稿日時フィールドは必須です。',
            'postedDate.date' => '投稿日時フィールドは有効な日付である必要があります。',
            'articleContents.required' => '本文フィールドは必須です。',
        ];

        return Validator::make($data, $rules, $messages);
    }

    public static function createArticle($validated_data)
    {
        return self::create([
            'title' => $validated_data['title'],
            'posted_date' => $validated_data['postedDate'],
            'article_contents' => $validated_data['articleContents']
        ]);
    }

    public static function updateArticle($article, $validated_data)
    {
        return $article->update([
            'title' => $validated_data['title'],
            'posted_date' => $validated_data['postedDate'],
            'article_contents' => $validated_data['articleContents']
        ]);
    }

}
