<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CurriculumController;

Route::get('/', function () { return view('welcome'); });

// ユーザー：時間割ページ（担当ページ）
Route::get('/user_timetable', [CurriculumController::class, 'userTimetable'])->name('user_timetable');
Route::get('/user_timetable/date/{date}/grade/{gradeId}', [CurriculumController::class, 'showCurriculumByDate'])->name('showCurriculumByDate');
Route::get('/user_timetable/grade/{gradeId}/date/{date}', [CurriculumController::class, 'showCurriculumByGrade'])->name('showCurriculumByGrade');
Route::post('/getSchedule', [CurriculumController::class, 'getSchedule'])->name('getSchedule');

// ユーザー：トップページ（仮）
Route::get('/user_top', [UserController::class, 'userTop'])->name('user_top');

// ユーザー：授業進捗ページ（仮）
Route::get('/user_progress', [UserController::class, 'userProgress'])->name('user_progress');

// ユーザー：プロフィール設定ページ（仮）
Route::get('/user_profile', [UserController::class, 'userProfile'])->name('user_profile');
Auth::routes();

// 管理者：トップページ（担当ページ）
Route::get('/admin_top', [AdminController::class, 'adminTop'])->name('admin_top');

// 管理者：授業管理ページ（仮）
Route::get('/admin_class', [AdminController::class, 'adminClass'])->name('admin_class');

// 管理者：お知らせ管理ページ（仮）
Route::get('/admin_news', [AdminController::class, 'adminNews'])->name('admin_news');

// 管理者：バナー管理ページ（担当ページ）
Route::get('/admin_banner', [BannerController::class, 'index'])->name('admin_banner');
Route::post('/banners', [BannerController::class, 'store'])->name('banner.store');
Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

// ユーザー用ページでログイン後にユーザーが user_top.blade.php にリダイレクトされるようにする
Route::get('/user_top', [UserController::class, 'userTop'])->name('user_top');

// 管理用ページでログイン後にユーザーが admin_top.blade.php にリダイレクトされるようにする
Route::get('/admin_top', [AdminController::class, 'adminTop'])->name('admin_top');

// ログイン関係
Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\admin\LoginController::class,'logout']);
Route::post('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('user/logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);
Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
Route::get('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('user.login');
Route::get('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');
Route::view('/admin/login', 'admin/login');
Route::view('/admin/register', 'admin/register');

// パスワード再設定
Route::view('/admin/password/reset', 'admin/passwords/email');
Route::post('/admin/password/email', [App\Http\Controllers\admin\ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::view('/admin/password/reset/{token}', [App\Http\Controllers\admin\ResetPasswordController::class,'showResetForm']);
Route::post('/admin/password/reset', [App\Http\Controllers\admin\ResetPasswordController::class, 'reset']);
Auth::routes();
