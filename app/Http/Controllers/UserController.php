<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userTop()
    {
        return view('user_top');
    }

    public function showUserTimetable()
    {
        $curriculums = Curriculum::all();
        return view('user_timetable', ['curriculums' => $curriculums]);
    }
}
