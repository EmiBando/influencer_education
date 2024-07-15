<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\CurriculumController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
// Route::get('/', function () {
//     return view('user_top');
// });

// Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/user_top',[EducationController::class,'user_top'])->name('user_top')->middleware('auth');
Route::get('/user/news',[EducationController::class,'news'])->name('news');
Route::get('/user/stream',[EducationController::class,'stream'])->name('stream');
Route::get('/user/profile',[EducationController::class,'profile'])->name('profile');

Route::get('/user/userTimetable',[CurriculumController::class,'userTimetable'])->name('userTimetable');
Route::get('/user/user_timetable/grade/{gradeId}', [CurriculumController::class, 'showCurriculumByGrade'])->name('showCurriculumByGrade');
Route::get('/user/user_timetable/date/{date}', [CurriculumController::class, 'showCurriculumByDate'])->name('showCurriculumByDate');
Route::post('/user/getSchedule', [CurriculumController::class, 'getSchedule'])->name('getSchedule');

Route::get('/user/lavel_chenge',[EducationController::class,'lavel_chenge'])->name('lavel_chenge');