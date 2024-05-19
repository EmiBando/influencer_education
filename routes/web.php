<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CurriculumController;

Route::get('/', function () { return view('welcome'); });

//ユーザー用時間割ページ
Route::get('/user_timetable', [CurriculumController::class, 'userTimetable'])->name('user_timetable');
Route::get('/user_timetable/grade/{gradeId}', [CurriculumController::class, 'showCurriculumByGrade'])->name('showCurriculumByGrade');
Route::post('/getSchedule', [CurriculumController::class, 'getSchedule'])->name('getSchedule');
//ユーザー用トップページ
Route::get('/user_top', function () { return view('user_top'); });

//ユーザー用授業進捗ページ
Route::get('/user_progress', function () { return view('user_progress'); })->name('user_progress');

//ユーザー用プロフィール設定ページ
Route::get('/user_profile', function () { return view('user_profile'); })->name('user_profile'); Auth::routes();

//管理用トップページ
Route::get('/admin_top', function () { return view('admin_top'); });

//管理用授業管理ページ
Route::get('/admin_class', function () { return view('admin_class'); })->name('admin_class');

//管理用お知らせ管理ページ
Route::get('/admin_news', function () { return view('admin_news'); })->name('admin_news');

//管理用バナー管理ページ
Route::get('/admin_banner', function () { return view('admin_banner'); })->name('admin_banner'); Auth::routes();

//ユーザー用ページでログイン後にユーザーが user_top.blade.php にリダイレクトされるようにする
Route::get('/user_top', [UserController::class, 'userTop'])->name('user_top');

//管理用ページでログイン後にユーザーが admin_top.blade.php にリダイレクトされるようにする
Route::get('/admin_top', [AdminController::class, 'adminTop'])->name('admin_top');

//ログイン関係
Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\admin\LoginController::class,'logout']);
//Route::post('user/logout', [App\Http\Controllers\admin\LoginController::class,'logout']);
Route::post('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('user/logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);
Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
Route::get('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('user.login');
Route::get('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');
Route::view('/admin/login', 'admin/login');
Route::view('/admin/register', 'admin/register');

//Route::post('/banners', 'App\Http\Controllers\BannerController@store')->name('banner.store');
Route::post('/banners', [App\Http\Controllers\BannerController::class, 'store'])->name('banner.store');

//パスワード再設定
Route::view('/admin/password/reset', 'admin/passwords/email');
Route::post('/admin/password/email', [App\Http\Controllers\admin\ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::view('/admin/password/reset/{token}', [App\Http\Controllers\admin\ResetPasswordController::class,'showResetForm']);
Route::post('/admin/password/reset', [App\Http\Controllers\admin\ResetPasswordController::class, 'reset']);
Auth::routes();