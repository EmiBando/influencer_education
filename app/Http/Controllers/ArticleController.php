<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
    $article = Article::findOrFail($id);
    return view('user.user_article_show', compact('article'));
    }

    //お知らせ一覧を取得し、ビューに渡す
    public function index()
    {
    $articles = Article::orderBy('posted_date', 'desc')->get();
    return view('admin.articles_index', compact('articles'));
    }

    //お知らせ登録画面へ遷移
    public function create()
    {
    $article = new Article();
    return view('admin.articles_form', compact('article'));
    }

    public function store(Request $request)
    {
        $validator = Article::validateArticle($request->all());
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Article::createArticle($validator->validated());
        return redirect()->route('admin.articles.index')->with('success', 'お知らせが登録されました。');
    }

    //お知らせの編集と更新
    public function edit(Article $article)
    {
        return view('admin.articles_form', compact('article'));
    }


    public function update(Request $request, Article $article)
    {
        $validator = Article::validateArticle($request->all());
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Article::updateArticle($article, $validator->validated());
        return redirect()->route('admin.articles.index')->with('success', 'お知らせが更新されました。');
    }


    //お知らせ削除
    public function destroy(Article $article)
    {
    $article->delete();
    return back();
    }
}
