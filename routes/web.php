<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserProgressController;
use App\Http\Controllers\UserController;

Route::get('/', function () { return view('welcome'); });

// ログイン関連ルート（既存）
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ユーザー画面：お知らせページへ遷移
Route::get('/user/article/{id}', [ArticleController::class, 'show'])->name('user.article.show')->middleware('auth');

//ユーザー画面：授業進捗
Route::get('/user/progress', [UserProgressController::class, 'index'])->name('user.progress')->middleware('auth');

//ユーザー画面：授業配信
Route::get('/user/stream/{id}', [UserProgressController::class, 'stream'])->name('user.stream')->middleware('auth');

// ユーザー画面：プロフィール設定ページ
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.profile.update');

// ユーザー画面：パスワード変更ページ
Route::get('/user/change-password', [UserController::class, 'changePassword'])->name('user.password.change')->middleware('auth');
Route::put('/user/update-password', [UserController::class, 'updatePassword'])->name('user.password.update');

// 管理者画面：お知らせ一覧
Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin.articles.index')->middleware('admin');

// 管理者画面：お知らせ登録
Route::get('/admin/create', [ArticleController::class, 'create'])->name('admin.articles.create')->middleware('admin');

// 管理者画面：お知らせ新規保存
Route::post('/admin', [ArticleController::class, 'store'])->name('admin.articles.store');

// 管理者画面：お知らせ更新
Route::put('/admin/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');

// 管理者画面：お知らせ編集
Route::get('/admin/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');

// 管理者画面：お知らせ削除
Route::delete('/admin/{article}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');

//temp管理者ログイン用
Route::view('/admin/login', 'admin/login');
Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [App\Http\Controllers\admin\LoginController::class,'logout'])->name('admin.logout');
Route::view('/admin/register', 'admin/register');
Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register'])->name('admin.register');;
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');