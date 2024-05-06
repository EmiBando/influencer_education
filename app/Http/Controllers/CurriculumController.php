<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    // カリキュラムの情報を表示
    public function userTimetable()
    {
        // カリキュラムの情報を取得
        $curriculums = Curriculum::all();

        // 取得した情報をビューに渡して表示
        return view('user_timetable', compact('curriculums'));
    }
}

